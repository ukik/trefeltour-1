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
use TourCarts;

use \BadasoUsers;
use CustomerPageModel;
use Faker\Core\Number;
use Google\Service\Eventarc\Transport;
use TourBookings;
use TourBookingsItems;
use TourPrices;


class TourCartsController extends Controller
{

    public $isLogged;
    public $isRole;

    public function __construct() {

        if(Auth::check()) {

            $this->isLogged = true;

            foreach (Auth::user()->roles as $key => $value) {
                $role = $value->name;
            }

            $this->isRole = $role;

        } else {
            return ApiResponse::unauthorized();
        }
    }

    public function lagia_browse(Request $request)
    {
        try {

            $data = \TourCarts::with([
                'badasoUsers',
                'badasoUser',

                'tourProduct',
                'tourProducts',
                'tourPrice',
                'tourPrices',
                'tourStore',
                'tourStores',
            ])->orderBy('id','desc');

            if(request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }

            if(request()->search) {
                $search = request()->search;

                $store_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%');
                };

                $price_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%')
                        ->orWhere('general_price','like','%'.$search.'%')
                        ->orWhere('discount_price','like','%'.$search.'%')
                        ->orWhere('cashback_price','like','%'.$search.'%');
                };

                $customer_id = function($q) use ($search) {
                    return $q
                        ->where('name','like','%'.$search.'%')
                        ->orWhere('username','like','%'.$search.'%')
                        ->orWhere('email','like','%'.$search.'%')
                        ->orWhere('phone','like','%'.$search.'%');
                };

                $product_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%');
                };


                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('tour_carts');

                foreach ($columns as $value) {
                    switch ($value) {
                        case "code_table":
                        case "deleted_at":
                            # code...
                            break;
                        default:
                            $data->orWhere($value,'like','%'.$search.'%');
                    }
                }

                $data = $data;
                    // ->orWhere('id','like','%'.$search.'%');
                    // ->orWhereHas('tourStore', $store_id)
                    // ->orWhereHas('tourProduct', $product_id)
                    // ->orWhereHas('tourPrice', $price_id)
                    // ->orWhereHas('badasoUser', $customer_id);
            }

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if(isClientOnly()) {
                $data->where('customer_id',authID());
            }

            $data = $data->paginate(request()->perPage);

            // $encode = json_encode($paginate);
            // $decode = json_decode($encode);
            // $data['data'] = $decode->data;
            // $data['total'] = $decode->total;

            $additional = [
                'customer' => CustomerPageModel::where('user_id',authID())->first(),
            ];

            return ApiResponse::onlyEntity($data, additional:$additional);
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

            $data = \TourCarts::with([
                // 'tourStore.tourBooking.badasoUsers',
                // 'tourStore.tourBooking.badasoUser',
                // 'tourStore.tourBookings',
                'badasoUsers',
                'badasoUser',

                'tourProduct',
                'tourProducts',
                'tourPrice',
                'tourPrices',
                'tourStore',
                'tourStores',
            ])->orderBy('id','desc');

            if(request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }

            // if(request()->search) {
            //     $search = request()->search;
            //     $productId = function($q) use ($search) {
            //         return $q->where('name','like','%'.$search.'%');
            //     };
            //     $priceId = function($q) use ($search) {
            //         return $q
            //             ->where('uuid','like','%'.$search.'%')
            //             ->orWhere('name','like','%'.$search.'%')
            //             ->orWhere('general_price','like','%'.$search.'%')
            //             ->orWhere('discount_price','like','%'.$search.'%')
            //             ->orWhere('cashback_price','like','%'.$search.'%');
            //     };
            //     $customerId = function($q) use ($search) {
            //         return $q->where('name','like','%'.$search.'%');
            //     };

            //     $data = $data
            //         ->orWhere('store_id','like','%'.$search.'%')
            //         ->orWhereHas('badasoUser', $customerId)
            //         ->orWhereHas('tourPrice', $priceId)
            //         ->orWhereHas('tourProduct', $productId);
            // }

            if(request()->search) {
                $search = request()->search;

                $store_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%');
                };

                $price_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%')
                        ->orWhere('general_price','like','%'.$search.'%')
                        ->orWhere('discount_price','like','%'.$search.'%')
                        ->orWhere('cashback_price','like','%'.$search.'%');
                };

                $customer_id = function($q) use ($search) {
                    return $q
                        ->where('name','like','%'.$search.'%')
                        ->orWhere('username','like','%'.$search.'%')
                        ->orWhere('email','like','%'.$search.'%')
                        ->orWhere('phone','like','%'.$search.'%');
                };

                $product_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%');
                };

                $data = $data
                    // ->orWhere('id','like','%'.$search.'%')
                    ->orWhereHas('tourStore', $store_id)
                    ->orWhereHas('tourProduct', $product_id)
                    ->orWhereHas('tourPrice', $price_id)
                    ->orWhereHas('badasoUser', $customer_id);
            }

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if(isClientOnly()) {
                $data->where('customer_id',authID());
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
                'id' => 'exists:'.$data_type->name,
            ]);

            // $data = $this->getDataDetail($slug, $request->id);
            $data = \TourCarts::query();

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if(isClientOnly()) {
                $data->where('customer_id',authID());
            }

            $data = $data->with([
                // 'tourStore.tourBooking.badasoUsers',
                // 'tourStore.tourBooking.badasoUser',
                // 'tourStore.tourBookings',
                'badasoUsers',
                'badasoUser',

                'tourProduct',
                'tourProducts',
                'tourPrice',
                'tourPrices',
                'tourStore',
                'tourStores',
            ])->whereId($request->id)->first();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }


    public function add(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        function getTotalAmount($value) {
            //console.log('getTotalAmount', value)
            return (
                $value?->general_price -
                ($value?->general_price * (($value?->discount_price)/100)) -
                ($value?->cashback_price)
            );
        }

        function getTotalAmountChild($value) {
            //console.log('getTotalAmount', value)
            return (
                $value?->general_price_child -
                ($value?->general_price_child * (($value?->discount_price)/100)) -
                ($value?->cashback_price)
            );
        }


        try {

            // get slug by route name and get data type in table
            $slug = $this->getSlug($request);

            $data_type = $this->getDataType($slug);

            $from_client = json_decode(request()->payload, true);
            $description = request()->description;
            $min_participant = request()->min_participant;

            $ids = [];
            $customers = [];
            foreach ($from_client as $key => $value) {
                $ids[] = $value['id'];
                $customers[] = $value['customerId'];
            }

            // ambil ulang data dari TourCarts
            $from_server_cart = \TourCarts::with([
                'tourPrice',
            ])->whereIn('id', $ids)->get();

            if(!$from_server_cart) return ApiResponse::failed("Data tidak ditemukan");

            $forms = [];
            foreach ($from_server_cart as $server) {
                foreach ($from_client as $client) {
                    if($server['customer_id'] == $client['customerId']) {

                        array_push($forms, [
                            'customer_id' => $server['customer_id'],
                            'store_id' => $server['store_id'],
                            'id' => $server['id'],
                            'total' => (getTotalAmount($server->tourPrice) * $server->participant_adult) + (getTotalAmountChild($server->tourPrice) * $server->participant_young),
                        ]);

                        // array_push($total_sums, [
                        //     'customer_id' => $pay['customerId'],
                        //     'customer_id_sql' => $value['customer_id'],
                        //     'id' => $value['id'],
                        //     'total' => getTotalAmount($value->tourPrice) * $value->quantity,
                        // ]);

                        break;
                    }
                }
            }


            // UNIQUE MODE
            // CONTOH
            /*
                $json='[
                    {"ID":"126871","total":"200.00","currency":"USD","name":"John"},
                    {"ID":"126872","total":"2000.00","currency":"Euro","name":"John"},
                    {"ID":"126872","total":"1000.00","currency":"Euro","name":"John"},
                    {"ID":"126872","total":"500.00","currency":"USD","name":"John"},
                    {"ID":"126872","total":"1000.00","currency":"Euro","name":"John"}
                ]';

                $array=json_decode($json,true);  // convert to array
                foreach($array as $row){
                    if(!isset($result[$row['ID'].$row['currency']])){
                        $result[$row['ID'].$row['currency']]=$row;  // on first occurrence, store the full row
                    }else{
                        $result[$row['ID'].$row['currency']]['total']+=$row['total'];  // after first occurrence, add current total to stored total
                    }
                }
                $result=json_encode(array_values($result));  // reindex the array and convert to json
                echo $result;  // display
            */

            // 1 DIMENSI
            $array=json_decode(json_encode($forms),true);  // convert to array
            $result = null;
            foreach($array as $row){
                if(!isset($result[$row['customer_id']])){
                    $result[$row['customer_id']]=$row;  // on first occurrence, store the full row
                }else{
                    $result[$row['customer_id']]['total']+=$row['total'];  // after first occurrence, add current total to stored total
                }
            }

            // return [ $result ];
            if(!$result) return ApiResponse::failed("Data tidak ditemukan");

            $forms = [];
            $uuids = [];
            foreach ($result as $res) {
                # code...

                $uuid = ShortUuid();
                $data = [
                    'customer_id' => $res['customer_id'] ,
                    'store_id' => $res['store_id'] ,

                    'get_final_amount' => $res['total'] ,

                    'description' => $description ,
                    'code_table' => ('tour-bookings') ,
                    'uuid' => $uuid,
                ];

                $validator = Validator::make($data,
                    [
                        'customer_id' => 'required',
                        'store_id' => 'required',
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

                $forms[] = $data;
                array_push($uuids, $uuid);

            }

            TourBookings::insert($forms);

            $bookings = TourBookings::whereIn('uuid', $uuids)->get();
            if(!$bookings) return ApiResponse::failed("Data tidak tersedia, refresh halaman");

            // INSERT BOOKING ITEMS
            $cartItems = [];
            foreach ($from_server_cart as $value) {
                foreach ($bookings as $booking) {
                    if($value['customer_id'] == $booking['customer_id']) {

                        # code...
                        $items = [
                            // INSERT TO BOOKING ITEMS
                            'booking_id' => $booking->id,
                            'store_id' => $value->store_id,
                            'customer_id' => $value->customer_id,
                            'product_id' => $value->product_id,
                            'name' => $value->tourPrice->name,
                            'get_price' => $value->tourPrice->general_price,
                            'get_price_child' => $value->tourPrice->general_price_child,
                            'get_discount' => $value->tourPrice->discount_price,
                            'get_cashback' => $value->tourPrice->cashback_price,
                            'get_total_amount' => getTotalAmount($value->tourPrice),
                            'get_total_amount_child' => getTotalAmountChild($value->tourPrice),
                            'quantity' => $value->quantity,
                            'get_final_amount' => (getTotalAmount($value->tourPrice) * $value->quantity) + getTotalAmountChild($value->tourPrice) * $value->quantity,

                            'date_start' => $value->date_start,
                            'participant_adult' => $value->participant_adult,
                            'participant_young' => $value->participant_young,
                            'hotel' => $value->hotel,

                            'description' => $value->tourPrice->description,
                            'min_participant' => $min_participant,

                            'code_table' => 'tour-booking-items',
                            'uuid' => ShortUuid(),
                        ];

                        $validator = Validator::make($items,
                            [
                                '*' => 'required',
                            ],
                        );
                        if ($validator->fails()) {
                            $errors = json_decode($validator->errors(), True);
                            foreach ($errors as $key => $value) {
                                return ApiResponse::failed(implode('',$value));
                            }
                        }

                        array_push($cartItems, $items);
                    }
                }
            }

            $booking_items = TourBookingsItems::insert($cartItems);

            // HAPUS CARTS
            \TourCarts::with([
                'tourPrice',
            ])->whereIn('id', $ids)->delete();

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties(['attributes' => [$booking, $booking_items]])
                ->log($data_type->display_name_singular.' has been created');


            foreach ($bookings as $booking) {
                NotifyToAdmin(new NotifyClientToAdminNotification(Auth::user(), 'tour', 'tour-bookings', $booking, 'Booking Baru'));
            }

            DB::commit();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_CREATE, $table_name);

            return ApiResponse::onlyEntity([$booking, $booking_items], additional:$booking);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }
    }


    public function delete(Request $request)
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
                ->log($data_type->display_name_singular.' has been deleted');

            DB::commit();

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
                ->log($data_type->display_name_singular.' has been restore');

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

            foreach ($id_list as $id) {
                $should_delete['id'] = $id;
                $this->deleteData($should_delete, $data_type, $is_hard_delete);
            }

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties($data)
                ->log($data_type->display_name_singular.' has been bulk deleted');

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
                ->log($data_type->display_name_singular.' has been bulk deleted');

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
                        ->log($data_type->display_name_singular.' has been sorted');
                }
            } else {
                foreach ($request->data as $index => $row) {
                    $updated_data[$order_column] = $index + 1;
                    DB::table($data_type->name)->where('id', $row['id'])->update($updated_data);

                    activity($data_type->display_name_singular)
                        ->causedBy(auth()->user() ?? null)
                        ->withProperties(['attributes' => $updated_data])
                        ->log($data_type->display_name_singular.' has been sorted');
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
