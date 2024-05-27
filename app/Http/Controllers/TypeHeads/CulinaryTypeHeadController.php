<?php

namespace App\Http\Controllers\TypeHeads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \BadasoUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use CulinaryBookings;
use CulinaryBookingsCheckPayments;
use CulinaryCarts;
use CulinaryPrices;

use CulinaryPaymentsValidations;
use CulinaryStores;
use Uasoft\Badaso\Helpers\ApiResponse;

use Illuminate\Support\Facades\Validator;
use Exception;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;

class CulinaryTypeHeadController extends Controller
{
    function getUser() {
        // if(isAdminCulinary()) {
        //     return Auth::user();
        // }

        return CulinaryStores::where('id', request()->id)->with('badasoUsers')->first()?->badasoUsers[0];

        // $temp = CulinaryStores::where('id', request()->id)->value('user_id');
        // return BadasoUsers::where('id', $temp)->first();
    }




    function dialog_product_culinary_stores() {
        $data = \CulinaryProducts::where('id',request()->id)
            ->with('culinaryStore.badasoUsers')
            ->first();
        $data = $data->culinaryStore;
        return ApiResponse::onlyEntity($data);
    }

    function dialog_prices_culinary_products() {
        $data = \CulinaryPrices::where('id',request()->id)
            ->with([
                'culinaryProduct.culinaryStores',
            ])
            ->first();
        $data = $data->culinaryProduct;
        return ApiResponse::onlyEntity($data);
    }




    function dialog_cart_price(Request $request) {
        // return request();
        $data = \CulinaryPrices::with([
            'culinaryStores',
            'culinaryStore',
            'culinaryProduct',
            'culinaryProducts',
        ])->where('id', request()->price_id)->first();
        return ApiResponse::onlyEntity($data);
    }

    function get_prices_booking(Request $request) {
        // return request();
        $payload = json_decode(request()->payload, true);
        $data = \CulinaryCarts::with([
            'badasoUsers',
            'badasoUser',

            'culinaryProduct',
            'culinaryProducts',
            'culinaryPrice',
            'culinaryPrices',
            'culinaryStore',
            'culinaryStores',
        ])->whereIn('id', $payload)->get();
        return ApiResponse::onlyEntity($data);
    }

    function add_to_cart(Request $request) {

        isAddOrUpdateToCart();

        DB::beginTransaction();

        try {
            // get slug by route name and get data type in table
            //$slug = getSlug($request);

            $data_type = getDataType('culinary-prices'); // nama table

            if(!request()->customer_id) return ApiResponse::failed("Customer wajib diisi");

            $data = CulinaryPrices::where('id', request()->price_id)->first();

            $quantity = request()->quantity;

            $carts = CulinaryCarts::query()
                ->where('customer_id', request()->customer_id)
                ->where('price_id', request()->price_id)
                ->first();

            $carts = CulinaryCarts::updateOrCreate([
                    'customer_id' => request()->customer_id,
                    'store_id' => $data->store_id,
                    'product_id' => $data->product_id,
                    'price_id' => $data->id,
                ],
                [
                    'customer_id' => request()->customer_id,
                    'store_id' => $data->store_id,
                    'product_id' => $data->product_id,
                    'price_id' => $data->id,
                    'quantity' => !$carts?->quantity ? $quantity : DB::raw("quantity + $quantity"), //DB::raw("quantity + $quantity"),
                    'code_table' => "culinary-carts",
                    'uuid' => $carts?->uuid ?: ShortUuid(),
                ]
            );

            activity($data_type->display_name_singular)
                ->causedBy(auth()->user() ?? null)
                ->withProperties(['attributes' => [$carts]])
                ->log($data_type->display_name_singular.' has been created');

            DB::commit();

            // add event notification handle
            $table_name = $data_type->name;
            FCMNotification::notification(FCMNotification::$ACTIVE_EVENT_ON_CREATE, $table_name);

            return ApiResponse::onlyEntity([$carts]);
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponse::failed($e);
        }

        // return request();
    }













    function update_to_cart(Request $request) {

        isAddOrUpdateToCart();


        // return request();
        if(!request()->quantity) return ApiResponse::failed("Customer wajib diisi");

        CulinaryCarts::where('id', request()->id)->update([
                'quantity' => request()->quantity,
        ]);

        $data = \CulinaryCarts::with([
            'badasoUsers',
            'badasoUser',

            'culinaryProduct',
            'culinaryProducts',
            'culinaryPrice',
            'culinaryPrices',
            'culinaryStores',
        ])->orderBy('id','desc');
        if(request()['showSoftDelete'] == 'true') {
            $data = $data->onlyTrashed();
        }

        if(request()->popup) {
            $data = $data->where('id', request()->id)->paginate(request()->perPage);
        } else {
            $data = $data->paginate(request()->perPage);
        }

        // $encode = json_encode($paginate);
        // $decode = json_decode($encode);
        // $data['data'] = $decode->data;
        // $data['total'] = $decode->total;

        return ApiResponse::onlyEntity($data);
    }





    function dialog_booking_culinary_bookings() {

        $data = CulinaryBookingsCheckPayments::where('payment_id',request()->id)->with([
            'badasoUsers',
            'culinaryBookings',
            'culinaryBooking',
            'culinaryStore',
            'culinaryStores',
        ])
        ->withCount([
            'culinaryBookingItems AS quantity_sum' => function ($query) {
                    $query->select(DB::raw("CONCAT(SUM(quantity), ' menu') as paidsum"));
                }
            ])
        ->first();
        return ApiResponse::onlyEntity($data);
    }


    function dialog_booking_culinary_payments_validations() {

        // $payment_id = CulinaryPaymentsValidations::where('id',request()->id)->value('payment_id');
        // $data = CulinaryBookingsCheckPayments::where('payment_id',$payment_id)->with([
        //     'badasoUsers',
        //     'culinaryBookings',
        //     'culinaryBooking',
        //     'culinaryStore',
        //     'culinaryStores',
        // ])->first();

        $data = CulinaryPaymentsValidations::where('id',request()->id)->with([
            'culinaryPayment',
            'culinaryPayment.badasoUsers',
            'culinaryPayment.culinaryBookings',
        ])->first();
        $data = $data->culinaryPayment;
        return ApiResponse::onlyEntity($data);
    }


}
