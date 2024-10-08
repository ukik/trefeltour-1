<?php

namespace App\Http\Controllers\Tours;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
// use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;
use Illuminate\Support\Facades\Auth;
use TourBookingsPayments;
use TourProducts;
use TourStores;

class TourPaymentsController extends Controller
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

    public function browse(Request $request)
    {
        try {
            // $slug = $this->getSlug($request);

            // $data_type = $this->getDataType($slug);

            // $only_data_soft_delete = $request->showSoftDelete == 'true';

            // $data = $this->getDataList($slug, $request->all(), $only_data_soft_delete);

            $data = TourBookingsPayments::with([
                'tourStores',
                'tourStore.badasoUser',
                'tourStore.badasoUsers',
                // 'tourStore.tourProduct',
                // 'tourStore.tourProducts',
                // 'tourStore.tourBooking',
                // 'tourStore.tourBookings',
                'tourPrice',
                'tourPrices',
                'ratingAvg',
            ])->orderBy('id','desc')->withCount('tourPrices');
            if(request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }
            // if(request()['label'] == 'SharedTableModal') {
            //     $data = $data->where('is_available','true');
            // }


            if(request()->search) {
                $search = request()->search;

                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('tour_products');

                $store_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%');
                };

                $data
                    // ->orWhere('id','like','%'.$search.'%')
                    ->orWhereHas('tourStore', $store_id);

                foreach ($columns as $value) {
                    switch ($value) {
                        // case "store_id":
                        case "code_table":
                        //case "created_at":
                        //case "updated_at":
                        case "deleted_at":
                            # code...
                            break;
                        default:
                            $data->orWhere($value,'like','%'.$search.'%');
                    }
                }

            }

            if(request()->available) {
                $available = request()->available;
                $data->where('is_available',$available);
            }

            if(request()->category) {
                $category = request()->category;
                $data->where('category',$category);
            }

            if(request()->parentId) {
                $parentId = request()->parentId;
                $data->where('store_id',$parentId);
            }


            // ================================================
            // jika di LAGIA referensi ke sini
            $additional = NULL;
            if(request()->vendor) {
                $data = $data->where('store_id',request()->vendor);
                $additional = TourStores::whereId(request()->vendor)->with(['ratingAvg'])->first();
            }
            // ================================================

            $data = $data->select(
                'id',
                'store_id',
                'uuid',
                'name',
                'category',
                'durasi',
                'description',
                'itinerary',
                'facility',
                'image',
                'level',
                'province',
                'city',
                'country',
                'is_available',
                'code_table',
                'created_at',
                'updated_at',
                'deleted_at',
                'slug',
                'keyword'
            )->paginate(request()->perPage);

            // $encode = json_encode($paginate);
            // $decode = json_decode($encode);
            // $data['data'] = $decode->data;
            // $data['total'] = $decode->total;

            return ApiResponse::onlyEntity($data, additional:$additional);
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

    public function read_lagia(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required',
            ]);
            $slug = $this->getSlug($request);
            // $data_type = $this->getDataType($slug);
            // $request->validate([
            //     'id' => 'exists:'.$data_type->name,
            // ]);

            // $data = $this->getDataDetail($slug, $request->id);
            $data = TourBookingsPayments::with([
                // 'tourStores',
                'badasoUser',
                'tourBookingItem.tourBookingPayments' => function($q) {
                    return $q->where('transaction_status','capture');
                },
                'tourBooking',
                'tourStore',
                'tourProduct' => function($q) {
                    return $q;
                    // return $q->select('id','category','durasi');
                },
                // 'tourStore.badasoUsers',
                // 'tourStore.tourProduct',
                // 'tourStore.tourProducts',
                // 'tourStore.tourBooking',
                // 'tourStore.tourBookings',
                // 'tourPrice',
                // 'tourPrices',
                // 'ratingAvg',
            ])->whereOrderId($request->id)->first();

            // add event notification handle
            $table_name = "tour_booking_payments"; //$data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

            return ApiResponse::onlyEntity($data);
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
            $data = TourBookingsPayments::with([
                'tourStores',
                'tourStore.badasoUser',
                'tourStore.badasoUsers',
                // 'tourStore.tourProduct',
                // 'tourStore.tourProducts',
                // 'tourStore.tourBooking',
                // 'tourStore.tourBookings',
                'tourPrice',
                'tourPrices',
                'ratingAvg',
            ])->whereId($request->id)->first();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    // public function edit(Request $request)
    // {
    //     // return $slug = $this->getSlug($request);
    //     DB::beginTransaction();

    //     //isOnlyAdminTour();

    //     try {

    //         // get slug by route name and get data type
    //         $slug = $this->getSlug($request);
    //         $data_type = $this->getDataType($slug);

    //         $table_entity = TourBookingsPayments::where('id', $request->data['id'])
    //             ->with('tourStore')->first();

    //         $store = $table_entity->tourStore;//->value('id');

    //         $req = request()['data'];

    //         $uuid = ShortUuid();
    //         $data = [

    //             'store_id' => $store->id,
    //             'name' => $req['name'],
    //             'category' => $req['category'],
    //             'durasi' => $req['durasi'],
    //             'description' => isset($req['description']) ? $req['description'] : '',
    //             'itinerary' => $req['itinerary'],
    //             'facility' => $req['facility'],
    //             'province' => $req['province'],
    //             'city' => isset($req['city']) ? $req['city'] : '',
    //             'country' => $req['country'],
    //             'level' => $req['level'],
    //             'is_available' => isBoolean($req['is_available']),
    //             'image' => imageFilterValue($req['image']),

    //             'code_table' => ('tour-products') ,
    //             'uuid' => $table_entity->uuid ?: $uuid,

    //             'slug' => $table_entity->slug ?: slug($store->name.'-'.$req['name'], $uuid),
    //             'keyword' => isset($req['keyword']) ? $req['keyword'] : NULL,
    //         ];

    //         $validator = Validator::make($data,
    //             [
    //                 'store_id' => 'required',
    //                 // susah karena pake softDelete, pakai cara manual saja
    //                 // 'ticket_id' => [
    //                 //     'required', \Illuminate\Validation\Rule::unique('travel_bookings')->ignore($req['id'])
    //                 // ],
    //             ],
    //         );

    //         if ($validator->fails()) {
    //             $errors = json_decode($validator->errors(), True);
    //             foreach ($errors as $key => $value) {
    //                 return ApiResponse::failed(implode('',$value));
    //             }
    //         }

    //         TourBookingsPayments::where('id', $request->data['id'])->update($data);
    //         $updated['old_data'] = $table_entity;
    //         $updated['updated_data'] = TourBookingsPayments::where('id', $request->data['id'])->first();

    //         DB::commit();
    //         activity($data_type->display_name_singular)
    //             ->causedBy(auth()->user() ?? null)
    //             ->withProperties([
    //                 'old' => $updated['old_data'],
    //                 'attributes' => $updated['updated_data'],
    //             ])
    //             ->log($data_type->display_name_singular.' has been updated');

    //         // add event notification handle
    //         $table_name = $data_type->name;
    //         FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_UPDATE, $table_name);

    //         return ApiResponse::onlyEntity($updated['updated_data']);
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return ApiResponse::failed($e);
    //     }
    // }

    // public function add(Request $request)
    // {
    //     DB::beginTransaction();

    //     //isOnlyAdminTour();

    //     try {

    //         // get slug by route name and get data type in table
    //         $slug = $this->getSlug($request);

    //         $data_type = $this->getDataType($slug);

    //         $req = request()['data'];

    //         $store = \TourStores::where('id',  $req['store_id'])->first();//->value('id');

    //         $uuid = ShortUuid();
    //         $data = [

    //             'store_id' => $req['store_id'],
    //             'name' => $req['name'],
    //             'category' => $req['category'],
    //             'durasi' => $req['durasi'],
    //             'description' => isset($req['description']) ? $req['description'] : '',
    //             'itinerary' => $req['itinerary'],
    //             'facility' => $req['facility'],
    //             'province' => $req['province'],
    //             'city' => isset($req['city']) ? $req['city'] : '',
    //             'country' => $req['country'],
    //             'level' => $req['level'],
    //             'is_available' => isBoolean($req['is_available']),
    //             'image' => imageFilterValue($req['image']),

    //             'code_table' => ('tour-products') ,
    //             'uuid' => $uuid,

    //             'slug' => slug($store->name.'-'.$req['name'], $uuid),
    //             'keyword' => isset($req['keyword']) ? $req['keyword'] : NULL,

    //         ];

    //         $validator = Validator::make($data,
    //             [
    //                 'store_id' => 'required',
    //                 // susah karena pake softDelete, pakai cara manual saja
    //                 // 'ticket_id' => [
    //                 //     'required', \Illuminate\Validation\Rule::unique('travel_bookings')->ignore($req['id'])
    //                 // ],
    //             ],
    //             [
    //                 // 'user_id.unique' => 'User sudah terdaftar'
    //             ]
    //         );
    //         if ($validator->fails()) {
    //             $errors = json_decode($validator->errors(), True);
    //             foreach ($errors as $key => $value) {
    //                 return ApiResponse::failed(implode('',$value));
    //             }
    //         }

    //         $stored_data = TourBookingsPayments::insert($data);

    //         activity($data_type->display_name_singular)
    //             ->causedBy(auth()->user() ?? null)
    //             ->withProperties(['attributes' => $stored_data])
    //             ->log($data_type->display_name_singular.' has been created');

    //         DB::commit();

    //         // add event notification handle
    //         $table_name = $data_type->name;
    //         FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_CREATE, $table_name);

    //         return ApiResponse::onlyEntity($stored_data);
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return ApiResponse::failed($e);
    //     }
    // }

    public function delete(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminTour();

        $value = request()['data'][0]['value'];
        $check = TourProducts::where('id', $value)->with(['tourPrice'])->first();
        if($check->tourBooking) return ApiResponse::failed("Tidak bisa dihapus, data ini digunakan");

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


            // ADDITIONAL BULK DELETE
            // -------------------------------------------- //
            $filters = TourProducts::whereIn('id', explode(",",request()['data'][0]['value']))->with('tourPrice')->get();
            $temp = [];
            foreach ($filters as $value) {
                if($value->tourPrice == null) {
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
