<?php

namespace App\Http\Controllers\Tours;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
use App\Notifications\NotifyClientToAdminNotification;
// use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;
use Illuminate\Support\Facades\Auth;
use TourBookings;

use \BadasoUsers;
use Faker\Core\Number;
use Google\Service\Eventarc\Transport;
use HotelLevelPricePageModel;
use TourBookingsItems;
use TourPrices;


use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Config;
use TourBookingsPayments;

class TourBookingsController extends Controller
{

    public $isLogged;
    public $isRole;

    protected $serverKey;
    protected $clientKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->clientKey = config('midtrans.client_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');

        $this->_configureMidtrans();

        if (Auth::check()) {

            $this->isLogged = true;

            foreach (Auth::user()->roles as $key => $value) {
                $role = $value->name;
            }

            $this->isRole = $role;
        } else {
            return ApiResponse::unauthorized();
        }
    }

    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$clientKey = $this->clientKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;

        // \Midtrans\Config::$serverKey = $this->serverKey;
        // \Midtrans\Config::$clientKey = $this->clientKey;
        // \Midtrans\Config::$isProduction = $this->isProduction;
        // \Midtrans\Config::$isSanitized = $this->isSanitized;
        // \Midtrans\Config::$is3ds = $this->is3ds;
    }

    public function lagia_browse(Request $request)
    {
        try {
            // $slug = $this->getSlug($request);

            // $data_type = $this->getDataType($slug);

            // $only_data_soft_delete = $request->showSoftDelete == 'true';

            // $data = $this->getDataList($slug, $request->all(), $only_data_soft_delete);

            $data = \TourBookings::with([
                // 'badasoUsers',
                'badasoUser',
                'tourStore.tourProduct',
                // 'tourStore.tourProducts',
                // 'tourStore.tourPrice',
                // 'tourStore.tourPrices',
                'tourStores',
                'tourBookingItem',
                // 'tourBookingItems',
                // 'tourPayment',
                // 'tourPayment.tourPaymentsValidation',
                // 'tourPayments'
            ])
                ->withCount([
                    'tourBookingItems AS quantity_sum' => function ($query) {
                        $query->select(DB::raw("CONCAT(SUM(quantity), ' menu') as paidsum"));
                    }
                ])
                ->orderBy('id', 'desc');
            if (request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }

            if (request()->search) {
                $search = request()->search;

                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('tour_bookings');

                $customer_id = function ($q) use ($search) {
                    return $q
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
                };

                $store_id = function ($q) use ($search) {
                    return $q
                        ->where('uuid', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                };

                $data
                    // ->orWhere('id','like','%'.$search.'%')
                    ->orWhereHas('badasoUser', $customer_id)
                    ->orWhereHas('tourStore', $store_id);

                foreach ($columns as $value) {
                    switch ($value) {
                            // case "customer_id":
                            // case "store_id":
                        case "code_table":
                            //case "created_at":
                            //case "updated_at":
                        case "deleted_at":
                            # code...
                            break;
                        default:
                            $data->orWhere($value, 'like', '%' . $search . '%');
                    }
                }
            }

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if (isClientOnly()) {
                $data->where('customer_id', authID());
            }

            $data = $data->paginate(request()->perPage);

            // $encode = json_encode($paginate);
            // $decode = json_decode($encode);
            // $data['data'] = $decode->data;
            // $data['total'] = $decode->total;

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }


    public function browse(Request $request)
    {
        try {
            // $slug = $this->getSlug($request);

            // $data_type = $this->getDataType($slug);

            // $only_data_soft_delete = $request->showSoftDelete == 'true';

            // $data = $this->getDataList($slug, $request->all(), $only_data_soft_delete);

            $data = \TourBookings::with([
                'badasoUsers',
                'badasoUser',
                'tourStore.tourProduct',
                'tourStore.tourProducts',
                // 'tourStore.tourPrice',
                // 'tourStore.tourPrices',
                'tourStores',
                'tourBookingItem',
                'tourBookingItems',
                'tourPayment',
                'tourPayment.tourPaymentsValidation',
                'tourPayments'
            ])
                ->withCount([
                    'tourBookingItems AS quantity_sum' => function ($query) {
                        $query->select(DB::raw("CONCAT(SUM(quantity), ' menu') as paidsum"));
                    }
                ])
                ->orderBy('id', 'desc');
            if (request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }

            if (request()->search) {
                $search = request()->search;

                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('tour_bookings');

                $customer_id = function ($q) use ($search) {
                    return $q
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
                };

                $store_id = function ($q) use ($search) {
                    return $q
                        ->where('uuid', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                };

                $data
                    // ->orWhere('id','like','%'.$search.'%')
                    ->orWhereHas('badasoUser', $customer_id)
                    ->orWhereHas('tourStore', $store_id);

                foreach ($columns as $value) {
                    switch ($value) {
                            // case "customer_id":
                            // case "store_id":
                        case "code_table":
                            //case "created_at":
                            //case "updated_at":
                        case "deleted_at":
                            # code...
                            break;
                        default:
                            $data->orWhere($value, 'like', '%' . $search . '%');
                    }
                }
            }

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if (isClientOnly()) {
                $data->where('customer_id', authID());
            }

            $data = $data->paginate(request()->perPage);

            // $encode = json_encode($paginate);
            // $decode = json_decode($encode);
            // $data['data'] = $decode->data;
            // $data['total'] = $decode->total;

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    public function all(Request $request)
    {
        try {
            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $builder_params = [
                'order_field' => isset($request['order_field']) ? $request['order_field'] : $data_type->order_column,
                'order_direction' => isset($request['order_direction']) ? $request['order_direction'] : $data_type->order_direction,
            ];

            if ($data_type->model_name) {
                $records = GetData::clientSideWithModel($data_type, $builder_params);
            } else {
                $records = GetData::clientSideWithQueryBuilder($data_type, $builder_params);
            }

            return ApiResponse::onlyEntity($records);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    public function read(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required',
            ]);
            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);
            $request->validate([
                'id' => 'exists:' . $data_type->name,
            ]);

            // $data = $this->getDataDetail($slug, $request->id);
            $data = \TourBookings::query();

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if (isClientOnly()) {
                $data->where('customer_id', authID());
            }

            $data = $data->with([
                'badasoUsers',
                'badasoUser',
                'tourStore.tourProduct',
                // 'tourStore.tourProducts',
                // 'tourStore.tourPrice',
                // 'tourStore.tourPrices',
                'tourStores',
                'tourBookingItem',
                'tourBookingItems',
                'tourPayment',
                'tourPayment.tourPaymentsValidation',
                'tourPayments'
            ])
                ->withCount([
                    'tourBookingItems AS quantity_sum' => function ($query) {
                        $query->select(DB::raw("CONCAT(SUM(quantity), ' menu') as paidsum"));
                    }
                ])
                ->whereId($request->id)->first();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    /*
    public function edit(Request $request)
    {
        // return $slug = $this->getSlug($request);
        DB::beginTransaction();

        //isOnlyAdminTour();

        $value = request()['data']['id'];
        $check = \TourPayments::where('booking_id', $value)->first();
        if($check && !isAdminTour()) return ApiResponse::failed("Tidak bisa diubah kecuali oleh admin, data ini sudah digunakan");

        try {

            // get slug by route name and get data type
            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $table_entity = \TourBookings::where('id', $request->data['id'])->first();

            $temp = \TourPrices::where('id', $request->data['price_id'])->first();
            if(!$temp) return ApiResponse::failed("Harga Kosong");

            $customer_id = BadasoUsers::where('id', $request->data['customer_id'])->value('id');

            $req = request()['data'];
            // if($req['days_duration'] <= 0) return ApiResponse::failed("Minimal 1 Hari");

            $data = [
                'customer_id' => $customer_id ,
                'store_id' => $temp->store_id ,

                'get_final_amount' => $temp->get_final_amount ,

                // 'get_total_amount' => round((($temp->general_price) - ((($temp->general_price) * ($temp->discount_price)/100)) - ($temp->cashback_price)), 2) ,
                // 'days_duration' => $req['days_duration'] ,

                'description' => $req['description'] ,
                'code_table' => ('tour-bookings') ,
                'uuid' => $table_entity->uuid ?: ShortUuid(),
            ];

            $validator = Validator::make($data,
                [
                    '*' => 'required',
                    // susah karena pake softDelete, pakai cara manual saja
                    // 'venue_id' => [
                    //     'required', \Illuminate\Validation\Rule::unique('tourism_bookings')->ignore($table_entity->id)
                    // ],
                    // 'customer_id' => [
                    //     'required', \Illuminate\Validation\Rule::unique('tourism_bookings')->ignore($table_entity->id)
                    // ],
                ],
            );
            if ($validator->fails()) {
                $errors = json_decode($validator->errors(), True);
                foreach ($errors as $key => $value) {
                    return ApiResponse::failed(implode('',$value));
                }
            }

            $data['description'] = $req['description'];
            $data['get_final_amount'] = $data['get_total_amount'] * $data['days_duration'];


            \TourBookings::where('id', $request->data['id'])->update($data);
            $updated['old_data'] = $table_entity;
            $updated['updated_data'] = \TourBookings::where('id', $request->data['id'])->first();

            DB::commit();
            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties([
                    'old' => $updated['old_data'],
                    'attributes' => $updated['updated_data'],
                ])
                ->log($data_type->display_name_singular.' has been updated');

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_UPDATE, $table_name);

            return ApiResponse::onlyEntity($updated['updated_data']);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function add(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        try {

            // get slug by route name and get data type in table
            $slug = $this->getSlug($request);

            $data_type = $this->getDataType($slug);

            $temp = \TourPrices::where('id', $request->data['price_id'])->first();
            if(!$temp) return ApiResponse::failed("Harga Kosong");

            $customer_id = BadasoUsers::where('id', $request->data['customer_id'])->value('id');

            $req = request()['data'];
            if($req['days_duration'] <= 0) return ApiResponse::failed("Minimal 1 Hari");

            $data = [
                'customer_id' => $req['customer_id'] ,
                'store_id' => $temp->store_id ,
                'price_id' => $temp->id ,

                'get_price' => $temp->general_price ,
                'get_discount' => $temp->discount_price ,
                'get_final_amount' => $temp->get_final_amount ,

                // 'description' => $req['description'] ,
                'code_table' => ('tour-bookings') ,
                'uuid' => ShortUuid(),
            ];

            $validator = Validator::make($data,
                [
                    '*' => 'required',
                    // susah karena pake softDelete, pakai cara manual saja
                    // 'ticket_id' => 'unique:travel_bookings'
                ],
            );
            if ($validator->fails()) {
                $errors = json_decode($validator->errors(), True);
                foreach ($errors as $key => $value) {
                    return ApiResponse::failed(implode('',$value));
                }
            }

            $data['description'] = $req['description'];
            $data['get_final_amount'] = $data['get_total_amount'] * $data['days_duration'];

            $stored_data = \TourBookings::insert($data);

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties(['attributes' => $stored_data])
                ->log($data_type->display_name_singular.' has been created');

            DB::commit();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_CREATE, $table_name);

            return ApiResponse::onlyEntity($stored_data);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }
    */


    public function add(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        function getTotalAmount($value)
        {
            return (
                $value['general_price'] -
                ($value['general_price'] * (($value['discount_price']) / 100)) -
                ($value['cashback_price'])
            );
        }

        function getTotalAmountChild($value)
        {
            return (
                $value['general_price_child'] -
                ($value['general_price_child'] * (($value['discount_price']) / 100)) -
                ($value['cashback_price'])
            );
        }

        function grandTotal($grandTotalHotel, $getTotalNonHotel)
        {
            return (float)($grandTotalHotel) + (float)($getTotalNonHotel);
        }
        function   grandTotalDP($grandTotal)
        {
            return ((float)($grandTotal) * 30) / 100;
        }
        function   grandTotalHotel($room_qty, $room_budget)
        {
            return (float)($room_qty) * (float)($room_budget);
        }
        function   getHotelAVG($getHotelPrice)
        {
            return (
                ((float)($getHotelPrice?->max_price) + (float)($getHotelPrice?->min_price)) / 2
            );
        }
        function subTotalAnak($participant_young, $finalPriceAnak)
        {
            return $participant_young * $finalPriceAnak;
        }
        function subTotalDewasa($participant_adult, $finalPrice)
        {
            return $participant_adult * $finalPrice;
        }
        function getAllPerserta($participant_adult, $participant_young)
        {
            return (float)($participant_adult) + (float)($participant_young);
        }
        function getHotelPrice($page_hotel_level_price)
        {
            return $page_hotel_level_price;
        }
        function getTotalNonHotel($subTotalAnak, $subTotalDewasa)
        {
            return (float)($subTotalAnak) + (float)($subTotalDewasa);
        }



        try {

            // get slug by route name and get data type in table
            $slug = $this->getSlug($request);

            $data_type = $this->getDataType('tour-bookings');

            $from_client = json_decode(request()->payload, true);

            $ids = [];
            // $customers = [];

            $price_ids = [];
            foreach ($from_client as $key => $value) {
                $ids[] = $value['id'];
                // $customers[] = $value['customerId'];
                $price_ids[] = $value['priceId'];
            }

            $product_slug = request()->product_slug;

            $date_start = request()->date_start;
            $participant_adult = request()->participant_adult;
            $participant_young = request()->participant_young;
            $description = request()->description;
            $hotel = request()->hotel;
            $dibayar = request()->dibayar;
            $dibayar_percent = request()->dibayar_percent;
            $dibayar_percent = $dibayar == 'full_payment' ? 100 : $dibayar_percent;

            $room_qty = request()->room_qty;
            $room_budget = request()->room_budget;

            $name = request()->name;
            $email = request()->email;
            $phone = request()->phone;
            $instance = request()->instance;
            $city = request()->city;
            $address = request()->address;


            // ambil ulang data dari TourCarts
            // $from_server_cart = \TourCarts::with([
            //     'tourPrice',
            // ])->whereIn('id', $ids)->get();
            $from_server_cart = TourPrices::whereIn('id', $price_ids)->get();

            if (!$from_server_cart) return ApiResponse::failed("Data tidak ditemukan");

            $page_hotel_level_price = HotelLevelPricePageModel::where('label', $hotel)->first();

            $customer_id = Auth::user()?->id;

            $forms = [];
            foreach ($from_server_cart as $server) {
                array_push($forms, $server);

                // array_push($forms, [
                //     'price_id' => $server['id'],
                //     'store_id' => $server['store_id'],
                //     'product_id' => $server['product_id'],
                //     'id' => $server['id'],
                //     'total' => (getTotalAmount($server) * $participant_adult) + (getTotalAmountChild($server) * $participant_young),
                // ]);
            }

            // 1 DIMENSI
            // $array=json_decode(json_encode($forms),true);  // convert to array
            $result = json_decode(json_encode($forms), true);  // convert to array
            // foreach($array as $row){
            //     if(!isset($result[$row['customer_id']])){
            //         $result[$row['customer_id']]=$row;  // on first occurrence, store the full row
            //     }else{
            //         $result[$row['customer_id']]['total']+=$row['total'];  // after first occurrence, add current total to stored total
            //     }
            // }

            // return [ $result ];
            // if(!$result) return ApiResponse::failed("Data tidak ditemukan");

            $forms = [];
            $uuids = [];
            $prices_ref = [];
            foreach ($result as $res) {
                # code...

                $_finalPrice = getTotalAmount($res);
                $_finalPriceAnak = getTotalAmountChild($res);

                $_subTotalAnak = subTotalAnak($participant_young, $_finalPriceAnak);
                $_subTotalDewasa = subTotalDewasa($participant_adult, $_finalPrice);

                $_getTotalNonHotel = getTotalNonHotel($_subTotalAnak, $_subTotalDewasa);
                $_grandTotalHotel = grandTotalHotel($room_qty, $room_budget);
                $_grandTotal = grandTotal($_grandTotalHotel, $_getTotalNonHotel);

                $uuid = ShortUuid();
                $data = [
                    // id
                    'customer_id' => $customer_id,
                    'store_id' => $res['store_id'],
                    // 'uuid'
                    'description' => $description,
                    'full_payment' => $_grandTotal,
                    'quantity_sum' => 1,
                    'coupon' => NULL,
                    'condition' => "PAYMENT WAITING",
                    'full_name' => $name,
                    'instance' => $instance,
                    'email' => $email,
                    'phone' => $phone,
                    'city' => $city,
                    'address' => $address,
                    'code_table' => ('tour-bookings'),
                    'uuid' => $uuid,
                ];

                $forms[] = $data;
                array_push($uuids, $uuid);

                $res['uuid'] = $uuid;
                array_push($prices_ref, $res);
            }

            // return $from_server_cart[0]->tourPrice;
            TourBookings::insert($forms);

            // return $from_server_cart;
            $bookings = TourBookings::whereIn('uuid', $uuids)->get();

            // return [$uuids,$prices_ref,$forms,$bookings];

            if (!$bookings) return ApiResponse::failed("Data tidak tersedia, refresh halaman");

            // INSERT BOOKING ITEMS
            $cartItems = [];
            // $updateBookings = [];
            // foreach ($from_server_cart as $value) {
            foreach ($prices_ref as $value) {
                foreach ($bookings as $booking) {
                    if ($value['uuid'] == $booking['uuid']) {

                        $_finalPrice = getTotalAmount($value);
                        $_finalPriceAnak = getTotalAmountChild($value);

                        $_subTotalAnak = subTotalAnak($participant_young, $_finalPriceAnak);
                        $_subTotalDewasa = subTotalDewasa($participant_adult, $_finalPrice);

                        $_getHotelPrice = getHotelPrice($page_hotel_level_price);
                        $_getTotalNonHotel = getTotalNonHotel($_subTotalAnak, $_subTotalDewasa);
                        $_grandTotalHotel = grandTotalHotel($room_qty, $room_budget);
                        $_grandTotal = grandTotal($_grandTotalHotel, $_getTotalNonHotel);
                        $_grandTotalDP = grandTotalDP($_grandTotal);
                        $_getHotelAVG = getHotelAVG($_getHotelPrice);
                        $_getAllPerserta = getAllPerserta($participant_adult, $participant_young);

                        # code...
                        $items = [
                            // id
                            // uuid
                            'booking_uuid' => $booking['uuid'],
                            'booking_id' => $booking['id'],
                            'customer_id' => $customer_id,
                            'store_id' => $value['store_id'],
                            'product_id' => $value['product_id'],
                            'price_id' => $value['id'],
                            'name' => $value['name'],
                            'get_price' => $value['general_price'],
                            'get_price_child' => $value['general_price_child'],
                            'get_discount' => $value['discount_price'],
                            'get_cashback' => $value['cashback_price'],
                            'get_total_amount' => $_subTotalDewasa,
                            'get_total_amount_child' => $_subTotalAnak,
                            'get_total_amount_tour' => $_getTotalNonHotel,
                            'quantity' => 1,
                            'stock' => 9999,
                            'min_participant' => $value['min_participant'],
                            'date_start' => $date_start,
                            'participant_adult' => $participant_adult,
                            'participant_young' => $participant_young,
                            'hotel' => $hotel,
                            'hotel_min_price' =>  $_getHotelPrice['min_price'],
                            'hotel_max_price' =>  $_getHotelPrice['max_price'],
                            'hotel_avg_price' =>  $_getHotelAVG,
                            'room_qty' =>  $room_qty,
                            'room_budget' =>  $room_budget,
                            'description' => $value['description'],

                            'full_payment' =>  $_grandTotal,
                            'dp_payment' =>  $_grandTotalDP,

                            'code_table' => 'tour-booking-items',
                            'uuid' => ShortUuid(),
                        ];

                        $validator = Validator::make(
                            $items,
                            [
                                '*' => 'required',
                                'customer_id' => '',
                            ],
                        );
                        if ($validator->fails()) {
                            $errors = json_decode($validator->errors(), True);
                            foreach ($errors as $key => $value) {
                                return ApiResponse::failed(implode('', $value));
                            }
                        }

                        array_push($cartItems, $items);

                        // array_push($updateBookings, [
                        //     'uuid' => $booking['uuid'],
                        //     // 'get_full_payment_single_bed' => $_get_full_payment_single_bed,
                        //     // 'get_full_payment_double_bed' => $_get_full_payment_double_bed,
                        //     // 'get_dp_payment_single_bed' => $_get_dp_payment_single_bed,
                        //     // 'get_dp_payment_double_bed' => $_get_dp_payment_double_bed,
                        // ]);
                    }
                }
            }

            $booking_items = TourBookingsItems::insert($cartItems);

            // TourBookings::upsert($updateBookings, uniqueBy: ['uuid'], update: ['get_full_payment_single_bed','get_full_payment_double_bed','get_dp_payment_single_bed','get_dp_payment_double_bed']);

            // MIDTRANS
            $uuid = uuid();
            $uuid = (explode("-", $uuid));
            $order_id = 'TOUR-' . $uuid[0] . '-' . $uuid[1];

            $bookings = TourBookings::whereIn('uuid', $uuids)->with([
                'tourBookingItem' => function ($q) {
                    return $q->select(['id','booking_id', 'product_id', 'store_id', 'name']);
                },
                'tourBookingItem.tourProduct' => function ($q) {
                    return $q->select(['id', 'name','uuid']);
                },
                'tourStore' => function ($q) {
                    return $q->select(['id', 'name','uuid']);
                },
            ])->get();

            $arrPayments = [];

            foreach ($prices_ref as $value) {
                foreach ($bookings as $booking) {
                    if ($value['uuid'] == $booking['uuid']) {

                        $full_payment = $booking['full_payment'];
                        $dp_payment = (double)$full_payment * (double)$dibayar_percent / 100;

                        // switch ($dibayar) {
                        //     case 'dp_payment':
                        //         $amount = $dp_payment;
                        //         break;
                        //     case 'full_payment':
                        //         $amount = $full_payment;
                        //         break;
                        // }

                        $amount = $dibayar == 'full_payment' ? $full_payment : $dp_payment;
                        $name_params = $booking?->tourBookingItem?->tourProduct['name'];

                        $url = env('APP_URL_CLIENT')."/redirect-tour/".$booking?->tourBookingItem?->tourProduct['uuid'];

                        $merchant_name = $booking?->tourStore['name'];

                        $params = [
                            'transaction_details' => [
                                'order_id'      => $order_id,
                                'gross_amount'  => $amount,
                            ],
                            'item_details' => [
                                [
                                    'id'        => $value['id'],
                                    'price'     => $amount,
                                    'quantity'  => 1,
                                    'name'      => substr($name_params, 0, 50),
                                    "brand"     => "LAGIA ENTERPRISE",
                                    "category"  => "TOUR & TRAVEL",
                                    "merchant_name" => substr($merchant_name, 0, 50),
                                    "url"       => $url

                                    // "id": "ITEM1",
                                    // "price": 10000,
                                    // "quantity": 1,
                                    // "name": "Midtrans Bear", (50 varchar)
                                    // "brand": "Midtrans", (50 varchar)
                                    // "category": "Toys", (50 varchar)
                                    // "merchant_name": "Midtrans", (50 varchar)
                                    // "url": "https://tokobuah.com/apple-fuji" (50 varchar)
                                ],
                            ],
                            'customer_details' => [
                                // Key `customer_details` dapat diisi dengan data customer yang melakukan order.
                                'first_name' => $name,
                                // 'instance' => $instance,
                                'email' => $email,
                                'phone' => $phone,
                                'city' => $city,
                                'address' => $address,
                            ]
                        ];

                        try {
                            $snapToken = Snap::getSnapToken($params);
                        } catch (\Throwable $th) {
                            return ApiResponse::failed("Payment gateway error, refresh halaman");
                        }

                        // return [$params, $snapToken];
                        $payments = [
                            'code_table' => 'tour-booking-payments',
                            'uuid' => ShortUuid(),

                            'booking_id' => $booking['id'],
                            'booking_uuid' => $booking['uuid'],
                            'booking_item_id' => $booking?->tourBookingItem?->id,
                            'order_id' => $order_id,
                            'store_id' => $booking['store_id'],
                            'product_id' => $booking?->tourBookingItem?->product_id,
                            'customer_id' => $customer_id,
                            'quantity_sum' => 1,
                            'coupon' => NULL,
                            'gross_amount' => $amount,
                            'dibayar' => $dibayar,
                            'dibayar_percent' => $dibayar_percent,
                            'transaction_status' => "unpaid",
                            'first_name' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'snap_token' => $snapToken,
                        ];

                        TourBookingsPayments::insert($payments);

                        $payments['product_slug'] = $product_slug;

                        array_push($arrPayments, $payments);
                    }
                }
            }

            // HAPUS CARTS
            // \TourCarts::with([
            //     'tourPrice',
            // ])->whereIn('id', $ids)->delete();
            \TourCarts::whereIn('id', $ids)->delete();

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties(['attributes' => [$booking, $booking_items]])
                ->log($data_type->display_name_singular . ' has been created');


            foreach ($bookings as $booking) {
                NotifyToAdmin(new NotifyClientToAdminNotification([
                    'name' => $name,
                    'email' => $email
                ], 'tour', 'tour-bookings', $booking, 'Booking Baru'));
            }

            DB::commit();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_CREATE, $table_name);

            return ApiResponse::onlyEntity($arrPayments);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }



    public function delete(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        $value = request()['data'][0]['value'];
        $check = TourBookings::where('id', $value)->with(['tourPayment'])->first();
        if (!$check) return ApiResponse::failed("Data tidak ditemukan");
        if ($check->tourPayment) return ApiResponse::failed("Tidak bisa dihapus, data ini digunakan");
        switch ($check->condition) {
            case "DOWN PAYMENT CONFIRMED":
            case "FULL PAYMENT CONFIRMED":
            case "PAYMENT TIMEOUT":
            case "PAYMENT CANCELLED":
                return ApiResponse::failed("Tidak bisa dihapus, data ini digunakan");
        }

        try {
            $request->validate([
                'slug' => 'required',
                'data' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $slug = $this->getSlug($request);
                        $data_type = $this->getDataType($slug);
                        $table_entity = DB::table($data_type->name)->where('id', $request->data[0]['value'])->first();

                        if (is_null($table_entity)) {
                            $fail(__('badaso::validation.crud.id_not_exist'));
                        }
                    },
                ],
                'data.*.field' => ['required'],
                'data.*.value' => ['required'],
            ]);

            $is_hard_delete = $request->isHardDelete == 'true';

            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $data = $this->createDataFromRaw($request->input('data') ?? [], $data_type);
            $this->deleteData($data, $data_type, $is_hard_delete);

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties($data)
                ->log($data_type->display_name_singular . ' has been deleted');

            DB::commit();

            TourBookingsItems::where('booking_id', $value)->delete();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_DELETE, $table_name);

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function restore(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'slug' => 'required',
                'data' => [
                    'required',
                ],
                'data.*.field' => ['required'],
                'data.*.value' => ['required'],
            ]);

            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $data = $this->createDataFromRaw($request->input('data') ?? [], $data_type);
            $this->restoreData($data, $data_type);

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties($data)
                ->log($data_type->display_name_singular . ' has been restore');

            DB::commit();

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function deleteMultiple(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        try {
            $request->validate([
                'slug' => 'required',
                'data' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $slug = $this->getSlug($request);
                        $data_type = $this->getDataType($slug);

                        $data = $this->createDataFromRaw($request->input('data') ?? [], $data_type);
                        $ids = $data['ids'];
                        $id_list = explode(',', $ids);
                        foreach ($id_list as $id) {
                            $table_entity = DB::table($data_type->name)->where('id', $id)->first();
                            if (is_null($table_entity)) {
                                $fail(__('badaso::validation.crud.id_not_exist'));
                            }
                        }
                    },
                ],
                'data.*.field' => ['required'],
                'data.*.value' => ['required'],
            ]);

            $is_hard_delete = $request->isHardDelete == 'true';

            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $data = $this->createDataFromRaw($request->input('data') ?? [], $data_type);
            $ids = $data['ids'];
            $id_list = explode(',', $ids);


            // ADDITIONAL BULK DELETE
            // -------------------------------------------- //
            $filters = TourBookings::whereIn('id', explode(",", request()['data'][0]['value']))->with('tourPayment')->get();
            $temp = [];
            foreach ($filters as $value) {
                if ($value->tourPayment == null) {
                    array_push($temp, $value['id']);
                }
            }
            $id_list = $temp;
            // -------------------------------------------- //


            foreach ($id_list as $id) {
                $should_delete['id'] = $id;
                $this->deleteData($should_delete, $data_type, $is_hard_delete);
            }

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties($data)
                ->log($data_type->display_name_singular . ' has been bulk deleted');

            DB::commit();

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function restoreMultiple(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'slug' => 'required',
                'data' => [
                    'required',
                ],
                'data.*.field' => ['required'],
                'data.*.value' => ['required'],
            ]);

            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $data = $this->createDataFromRaw($request->input('data') ?? [], $data_type);
            $ids = $data['ids'];
            $id_list = explode(',', $ids);
            foreach ($id_list as $id) {
                $should_delete['id'] = $id;
                $this->restoreData($should_delete, $data_type);
            }

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties($data)
                ->log($data_type->display_name_singular . ' has been bulk deleted');

            DB::commit();

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function sort(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'slug' => 'required',
                'data' => [
                    'required',
                ],
            ]);

            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);
            $order_column = $data_type->order_column;

            if ($data_type->model_name) {
                $model = app($data_type->model_name);
                foreach ($request->data as $index => $row) {
                    $single_data = $model::find($row['id']);
                    $single_data[$order_column] = $index + 1;
                    $single_data->save();

                    activity($data_type->display_name_singular)
                        ->causedBy(auth()->user() ?? null)
                        ->withProperties(['attributes' => $single_data])
                        ->log($data_type->display_name_singular . ' has been sorted');
                }
            } else {
                foreach ($request->data as $index => $row) {
                    $updated_data[$order_column] = $index + 1;
                    DB::table($data_type->name)->where('id', $row['id'])->update($updated_data);

                    activity($data_type->display_name_singular)
                        ->causedBy(auth()->user() ?? null)
                        ->withProperties(['attributes' => $updated_data])
                        ->log($data_type->display_name_singular . ' has been sorted');
                }
            }

            DB::commit();

            return ApiResponse::onlyEntity();
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }

    public function setMaintenanceState(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'slug' => 'required|exists:Uasoft\Badaso\Models\DataType,slug',
                'is_maintenance' => 'required',
            ]);

            $data_type = DataType::where('slug', $request->slug)->firstOrFail();
            $data_type->is_maintenance = $request->is_maintenance ? 1 : 0;
            $data_type->save();

            DB::commit();

            return ApiResponse::success();
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }
}
