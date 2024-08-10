<?php

namespace App\Http\Controllers\AddToCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \BadasoUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use TourBookings;
use TourBookingsCheckPayments;
use TourCarts;
use TourPrices;

use TourPaymentsValidations;
use TourStores;
use Uasoft\Badaso\Helpers\ApiResponse;

use Illuminate\Support\Facades\Validator;
use Exception;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;

class TourTypeHeadController extends Controller
{
    function getUser() {
        // if(isAdminTour()) {
        //     return Auth::user();
        // }

        return TourStores::where('id', request()->id)->with('badasoUsers')->first()?->badasoUsers[0];

        // $temp = TourStores::where('id', request()->id)->value('user_id');
        // return BadasoUsers::where('id', $temp)->first();
    }




    function dialog_product_tour_stores() {
        $data = \TourProducts::where('id',request()->id)
            ->with('tourStore.badasoUsers')
            ->first();
        $data = $data->tourStore;
        return ApiResponse::onlyEntity($data);
    }

    function dialog_prices_tour_products() {
        $data = \TourPrices::where('id',request()->id)
            ->with([
                'tourProduct.tourStores',
            ])
            ->first();
        $data = $data->tourProduct;
        return ApiResponse::onlyEntity($data);
    }




    function dialog_cart_price(Request $request) {
        // return request();
        $data = \TourPrices::with([
            'tourStores',
            'tourStore',
            'tourProduct',
            'tourProducts',
        ])->where('id', request()->price_id)->first();
        return ApiResponse::onlyEntity($data);
    }

    function get_prices_booking(Request $request) {
        // return request();
        $payload = json_decode(request()->payload, true);
        $data = \TourCarts::with([
            'badasoUsers',
            'badasoUser',

            'tourProduct',
            'tourProducts',
            'tourPrice',
            'tourPrices',
            'tourStore',
            'tourStores',
        ])->whereIn('id', $payload)->get();
        return ApiResponse::onlyEntity($data);
    }

    function add_to_cart(Request $request) {

        isAddOrUpdateToCart();

        DB::beginTransaction();

        try {
            // get slug by route name and get data type in table
            //$slug = getSlug($request);

            $data_type = getDataType('tour-prices'); // nama table

            $customer_id = request()->customer_id;

            if(!$customer_id) return ApiResponse::failed("Customer wajib diisi");
            // if(!request()->customer_id) return ApiResponse::failed("Customer wajib diisi");

            $data = TourPrices::where('id', request()->price_id)->first();

            $quantity = request()->quantity;
            $date_start =  request()->date_start;

            $participant_adult =  request()->participant_adult;
            if(!$participant_adult) return ApiResponse::failed("Dewasa wajib diisi");

            $participant_young =  request()->participant_young;
            $participant_young = !$participant_young ? 0 : $participant_young;
            $description =  request()->description;
            $hotel =  request()->hotel;

            $carts = TourCarts::query()
                ->where('customer_id', $customer_id)
                ->where('price_id', request()->price_id)
                ->where('date_start', $date_start)
                ->first();

            $carts = TourCarts::updateOrCreate([
                    'customer_id' => $customer_id,
                    'store_id' => $data->store_id,
                    'product_id' => $data->product_id,
                    'price_id' => $data->id,

                    'date_start' => $date_start,
                ],
                [
                    'customer_id' => $customer_id,
                    'store_id' => $data->store_id,
                    'product_id' => $data->product_id,
                    'price_id' => $data->id,
                    // 'quantity' => !$carts?->quantity ? $quantity : DB::raw("quantity + $quantity"), //DB::raw("quantity + $quantity"),
                    'quantity' => 1,
                    'code_table' => "tour-carts",
                    'uuid' => $carts?->uuid ?: ShortUuid(),

                    'date_start' => $date_start,
                    'participant_adult' => $participant_adult,
                    'participant_young' => $participant_young,
                    'description' => $description,
                    'hotel' => $hotel,
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

        TourCarts::where('id', request()->id)->update([
                'quantity' => request()->quantity,
        ]);

        $data = \TourCarts::with([
            'badasoUsers',
            'badasoUser',

            'tourProduct',
            'tourProducts',
            'tourPrice',
            'tourPrices',
            'tourStores',
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





    function dialog_booking_tour_bookings() {

        $data = TourBookingsCheckPayments::where('payment_id',request()->id)->with([
            'badasoUsers',
            'tourBookings',
            'tourBooking',
            'tourStore',
            'tourStores',
        ])
        ->withCount([
            'tourBookingItems AS quantity_sum' => function ($query) {
                    $query->select(DB::raw("CONCAT(SUM(quantity), ' menu') as paidsum"));
                }
            ])
        ->first();
        return ApiResponse::onlyEntity($data);
    }


    function dialog_booking_tour_payments_validations() {

        // $payment_id = TourPaymentsValidations::where('id',request()->id)->value('payment_id');
        // $data = TourBookingsCheckPayments::where('payment_id',$payment_id)->with([
        //     'badasoUsers',
        //     'tourBookings',
        //     'tourBooking',
        //     'tourStore',
        //     'tourStores',
        // ])->first();

        $data = TourPaymentsValidations::where('id',request()->id)->with([
            'tourPayment',
            'tourPayment.badasoUsers',
            'tourPayment.tourBookings',
        ])->first();
        $data = $data->tourPayment;
        return ApiResponse::onlyEntity($data);
    }


}
