<?php

namespace App\Http\Controllers\Culinarys;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
use App\Notifications\NotifyClientToAdminNotification;
// use App\Http\Controllers\Controller;
use Exception;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;
use Illuminate\Support\Facades\Auth;
use CulinaryPayments;
use CulinaryPaymentsValidations;

class CulinaryPaymentsController extends Controller
{

    public $isLogged;
    public $isRole;

    public function __construct()
    {

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

    public function browse(Request $request)
    {
        try {
            // $slug = $this->getSlug($request);

            // $data_type = $this->getDataType($slug);

            // $only_data_soft_delete = $request->showSoftDelete == 'true';

            // $data = $this->getDataList($slug, $request->all(), $only_data_soft_delete);

            $data = \CulinaryPayments::with([
                'badasoUser',
                'badasoUsers',
                'culinaryBookings',
                'culinaryBooking',
                'culinaryPaymentsValidation',
                'culinaryPaymentsValidations',
            ])->orderBy('id', 'desc');
            if (request()['showSoftDelete'] == 'true') {
                $data = $data->onlyTrashed();
            }

            // if(request()->search) {
            //     $search = request()->search;
            //     // $productId = function($q) use ($search) {
            //     //     return $q->where('name','like','%'.$search.'%');
            //     // };
            //     $booking = function($q) use ($search) {
            //         return $q
            //             ->where('uuid','like','%'.$search.'%');
            //             // ->orWhere('name','like','%'.$search.'%')
            //             // ->orWhere('general_price','like','%'.$search.'%')
            //             // ->orWhere('discount_price','like','%'.$search.'%')
            //             // ->orWhere('cashback_price','like','%'.$search.'%');
            //     };
            //     $customerId = function($q) use ($search) {
            //         return $q->where('name','like','%'.$search.'%');
            //     };

            //     $columns = Schema::getColumnListing('culinary_payments');

            //     foreach ($columns as $value) {
            //         switch ($value) {
            //             case "booking_id":
            //             case "customer_id":
            //             case "code_table":
            //             case "created_at":
            //             case "updated_at":
            //             case "deleted_at":
            //                 # code...
            //                 break;
            //             default:
            //                 $data->orWhere($value,'like','%'.$search.'%');
            //                 break;
            //         }
            //     }

            //     $data = $data
            //         ->orWhereHas('badasoUser', $customerId)
            //         ->orWhereHas('culinaryBooking', $booking);
            //         // ->orWhereHas('culinaryProduct', $productId);
            // }



            if(request()->search) {
                $search = request()->search;

                $booking_id = function($q) use ($search) {
                    return $q
                        ->where('uuid','like','%'.$search.'%');
                };

                $customer_id = function($q) use ($search) {
                    return $q
                        ->where('name','like','%'.$search.'%')
                        ->orWhere('username','like','%'.$search.'%')
                        ->orWhere('email','like','%'.$search.'%')
                        ->orWhere('phone','like','%'.$search.'%');
                };

                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('culinary_payments');

                foreach ($columns as $value) {
                    switch ($value) {
                        // case "booking_id":
                        // case "customer_id":
                        case "code_table":
                        //case "created_at":
                        //case "updated_at":
                        case "deleted_at":
                            # code...
                            break;
                        default:
                            $data->orWhere($value,'like','%'.$search.'%');
                            break;
                    }
                }

                $data = $data
                    ->orWhereHas('badasoUser', $customer_id)
                    ->orWhereHas('culinaryBooking', $booking_id);
            }


            if(request()->method) {
                $method = request()->method;
                $data->where('method',$method);
            }

            if(request()->status) {
                $status = request()->status;
                $data->where('status',$status);
            }

            if(request()->is_selected) {
                $is_selected = request()->is_selected;
                $data->where('is_selected',$is_selected);
            }

            if(request()->component == 'SharedTableModalPaymentValidation') {
                $data->where('is_selected', 'false');
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
                'id' => 'exists:' . $data_type->name,
            ]);

            // $data = $this->getDataDetail($slug, $request->id);
            $data = \CulinaryPayments::query();

            // Role Data
            // Client hanya bisa melihat data mereka sendiri
            if(isClientOnly()) {
                $data->where('customer_id',authID());
            }

            $data = $data->with([
                'badasoUser',
                'badasoUsers',
                'culinaryBookings',
                'culinaryBooking',
                'culinaryPaymentsValidation',
                'culinaryPaymentsValidations',
            ])->whereId($request->id)->first();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    public function edit(Request $request)
    {

        DB::beginTransaction();

        $value = request()['data']['id'];
        $check = CulinaryPaymentsValidations::where('payment_id', $value)->first();
        if ($check && !isAdminCulinary()) return ApiResponse::failed("Tidak bisa diubah kecuali oleh admin, data ini sudah digunakan");

        try {

            // get slug by route name and get data type
            $slug = $this->getSlug($request);
            $data_type = $this->getDataType($slug);

            $table_entity = \CulinaryPayments::where('id', $request->data['id'])->with('culinaryBooking')->first();
            $temp = $table_entity->culinaryBooking;
            // $temp = \CulinaryBookings::where('id', $request->data['booking_id'])->first();

            $req = request()['data'];
            $data = [
                'customer_id' => $temp->customer_id,
                'booking_id' => $temp->id,

                'total_amount' => $temp->get_final_amount,
                'code_transaction' => $req['code_transaction'],
                'method' => $req['method'],
                'date' => $req['date'],
                'status' => $req['status'],
                'receipt' => $req['receipt'],
                // 'description' => $req['description'],
                'code_table' => ($slug),
                'uuid' => $table_entity->uuid ?: ShortUuid(),
            ];

            $validator = Validator::make(
                $data,
                [
                    '*' => 'required',
                    'booking_id' => 'unique:culinary_payments_unique,booking_id,' . $req['id']
                    // susah karena pake softDelete, pakai cara manual saja
                    // 'booking_id' => 'unique:travel_payments,booking_id,'.$req['id'] //\Illuminate\Validation\Rule::unique('travel_payments')->ignore($req['id'])
                ],
            );
            if ($validator->fails()) {
                $errors = json_decode($validator->errors(), True);
                foreach ($errors as $key => $value) {
                    return ApiResponse::failed(implode('', $value));
                }
            }

            $data['description'] = $req['description'];

            \CulinaryPayments::where('id', $request->data['id'])->update($data);
            $updated['old_data'] = $table_entity;
            $updated['updated_data'] = \CulinaryPayments::where('id', $request->data['id'])->first();

            DB::commit();
            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties([
                    'old' => $updated['old_data'],
                    'attributes' => $updated['updated_data'],
                ])
                ->log($data_type->display_name_singular . ' has been updated');

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

        // // UNIQUE + SoftDelete
        // // cukup CREATE aja karena di edit tidak bisa di edit relationship
        // $unique = CulinaryPayments::where('booking_id', $request->data['booking_id'])
        //     ->where('deleted_at', NULL)->first();
        // if ($unique) return ApiResponse::failed('Booking UUID sudah dipakai');

        try {

            // get slug by route name and get data type in table
            $slug = $this->getSlug($request);

            $data_type = $this->getDataType($slug);

            $temp = \CulinaryBookings::where('id', $request->data['booking_id'])->first();

            $req = request()['data'];
            $data = [
                'customer_id' => $temp->customer_id,
                'booking_id' => $temp->id,

                'total_amount' => $temp->get_final_amount,
                'code_transaction' => $req['code_transaction'],
                'method' => $req['method'],
                'date' => $req['date'],
                'status' => $req['status'],
                'receipt' => $req['receipt'],
                // 'description' => $req['description'],
                'code_table' => ($slug),
                'uuid' => ShortUuid(),
            ];

            $validator = Validator::make(
                $data,
                [
                    '*' => 'required',
                    'booking_id' => 'unique:culinary_payments_unique'
                    // susah karena pake softDelete, pakai cara manual saja
                    // 'booking_id' => 'unique:travel_payments'
                ],
            );
            if ($validator->fails()) {
                $errors = json_decode($validator->errors(), True);
                foreach ($errors as $key => $value) {
                    return ApiResponse::failed(implode('', $value));
                }
            }

            $data['description'] = $req['description'];

            $stored_data = \CulinaryPayments::insert($data);

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties(['attributes' => $stored_data])
                ->log($data_type->display_name_singular . ' has been created');

            // NOTIFICATION
            $payload = CulinaryPayments::where('booking_id', $request->data['booking_id'])->first();
            if($payload['is_valid'] === 'true') {
                NotifyToAdmin(new NotifyClientToAdminNotification(Auth::user(), 'culinary', 'culinary-payments', $payload, 'Booking Diproses'));
            }

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

    public function delete(Request $request)
    {
        DB::beginTransaction();

        //isOnlyAdminCulinary();

        $value = request()['data'][0]['value'];
        $check = CulinaryPayments::where('id', $value)->with(['culinaryPaymentsValidation'])->first();
        if($check->culinaryPaymentsValidation) return ApiResponse::failed("Tidak bisa dihapus, data ini digunakan");

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
            $filters = CulinaryPayments::whereIn('id', explode(",", request()['data'][0]['value']))->with('culinaryPaymentsValidation')->get();
            $temp = [];
            foreach ($filters as $value) {
                if ($value->culinaryPaymentsValidation == null) {
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
