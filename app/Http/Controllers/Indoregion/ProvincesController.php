<?php

namespace App\Http\Controllers\Indoregion;

use AboutPageModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
use App\Models\Province;
use App\Models\Regency;
// use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;
use Illuminate\Support\Facades\Auth;

class ProvincesController  extends Controller
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
            $data = Province::query();

            if(request()->search) {
                $search = request()->search;

                $columns = \Illuminate\Support\Facades\Schema::getColumnListing('provinces');

                foreach ($columns as $value) {
                    $data->orWhere($value,'like','%'.$search.'%');
                }

            }

            $data = $data->paginate(100);

            // $encode = json_encode($paginate);
            // $decode = json_decode($encode);
            // $data['data'] = $decode->data;
            // $data['total'] = $decode->total;

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }

    // public function all(Request $request)
    // {
    //     try {
    //         $slug = $this->getSlug($request);
    //         $data_type = $this->getDataType($slug);

    //         $builder_params = [
    //             'order_field' => isset($request['order_field']) ? $request['order_field'] : $data_type->order_column,
    //             'order_direction' => isset($request['order_direction']) ? $request['order_direction'] : $data_type->order_direction,
    //         ];

    //         if ($data_type->model_name) {
    //             $records = GetData::clientSideWithModel($data_type, $builder_params);
    //         } else {
    //             $records = GetData::clientSideWithQueryBuilder($data_type, $builder_params);
    //         }

    //         return ApiResponse::onlyEntity($records);
    //     } catch (Exception $e) {
    //         return ApiResponse::failed($e);
    //     }
    // }

    // public function read(Request $request)
    // {

    //     try {
    //         $request->validate([
    //             'id' => 'required',
    //         ]);
    //         $slug = $this->getSlug($request);
    //         $data_type = $this->getDataType($slug);

    //         $request->validate([
    //             'id' => 'exists:' . $data_type->name,
    //         ]);

    //         // $data = $this->getDataDetail($slug, $request->id);
    //         $data = \AboutPageModel::with([])->whereId($request->id)->first();

    //         // add event notification handle
    //         $table_name = $data_type->name;
    //         FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_READ, $table_name);

    //         return ApiResponse::onlyEntity($data);
    //     } catch (Exception $e) {
    //         return ApiResponse::failed($e);
    //     }
    // }

    // public function sort(Request $request)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $request->validate([
    //             'slug' => 'required',
    //             'data' => [
    //                 'required',
    //             ],
    //         ]);

    //         $slug = $this->getSlug($request);
    //         $data_type = $this->getDataType($slug);
    //         $order_column = $data_type->order_column;

    //         if ($data_type->model_name) {
    //             $model = app($data_type->model_name);
    //             foreach ($request->data as $index => $row) {
    //                 $single_data = $model::find($row['id']);
    //                 $single_data[$order_column] = $index + 1;
    //                 $single_data->save();

    //                 activity($data_type->display_name_singular)
    //                     ->causedBy(auth()->user() ?? null)
    //                     ->withProperties(['attributes' => $single_data])
    //                     ->log($data_type->display_name_singular . ' has been sorted');
    //             }
    //         } else {
    //             foreach ($request->data as $index => $row) {
    //                 $updated_data[$order_column] = $index + 1;
    //                 DB::table($data_type->name)->where('id', $row['id'])->update($updated_data);

    //                 activity($data_type->display_name_singular)
    //                     ->causedBy(auth()->user() ?? null)
    //                     ->withProperties(['attributes' => $updated_data])
    //                     ->log($data_type->display_name_singular . ' has been sorted');
    //             }
    //         }

    //         DB::commit();

    //         return ApiResponse::onlyEntity();
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return ApiResponse::failed($e);
    //     }
    // }

    // public function setMaintenanceState(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $request->validate([
    //             'slug' => 'required|exists:Uasoft\Badaso\Models\DataType,slug',
    //             'is_maintenance' => 'required',
    //         ]);

    //         $data_type = DataType::where('slug', $request->slug)->firstOrFail();
    //         $data_type->is_maintenance = $request->is_maintenance ? 1 : 0;
    //         $data_type->save();

    //         DB::commit();

    //         return ApiResponse::success();
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         return ApiResponse::failed($e);
    //     }
    // }
}
