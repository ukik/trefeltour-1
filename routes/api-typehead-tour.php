<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Str;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Middleware\ApiRequest;
use Uasoft\Badaso\Middleware\BadasoAuthenticate;
use Uasoft\Badaso\Middleware\BadasoCheckPermissions;
use Uasoft\Badaso\Middleware\BadasoCheckPermissionsForCRUD;

use \App\Http\Middleware\BadasoCheckPermissions as RootBadasoCheckPermissions;
use \App\Http\Middleware\BadasoCheckPermissionsForCRUD as RootBadasoCheckPermissionsForCRUD;
use \App\Http\Middleware\BadasoAuthenticate as RootBadasoAuthenticate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/typehead/tour', 'middleware' => ['sanctum_1','BADASO_ApiRequest'], 'namespace' => 'App\Http\Controllers\AddToCart'], function ($request) {
    Route::get('/user', 'TourTypeHeadController@getUser');
    Route::get('/add_to_cart_user', 'TourTypeHeadController@getUser');
    Route::post('/get_prices_booking', 'TourTypeHeadController@get_prices_booking');
    Route::post('/update_to_cart', 'TourTypeHeadController@update_to_cart');
    Route::post('/add_to_cart', 'TourTypeHeadController@add_to_cart');

    Route::get('/dialog_cart_price', 'TourTypeHeadController@dialog_cart_price');

    Route::get('/dialog_product_tour_stores', 'TourTypeHeadController@dialog_product_tour_stores');
    Route::get('/dialog_prices_tour_products', 'TourTypeHeadController@dialog_prices_tour_products');

    Route::get('/dialog_booking_tour_bookings', 'TourTypeHeadController@dialog_booking_tour_bookings');
    Route::get('/dialog_booking_tour_payments_validations', 'TourTypeHeadController@dialog_booking_tour_payments_validations');
});

// Route::group(['prefix' => '/typehead/tour', 'middleware' => ['sanctum_1','BADASO_ApiRequest'], 'namespace' => 'App\Http\Controllers\AddToCart'], function ($request) {
//     Route::get('/user', 'TourTypeHeadController@getUser');
//     Route::get('/add_to_cart_user', 'TourTypeHeadController@getUser');
//     Route::post('/get_prices_booking', 'TourTypeHeadController@get_prices_booking');
//     Route::post('/update_to_cart', 'TourTypeHeadController@update_to_cart');
//     Route::post('/add_to_cart', 'TourTypeHeadController@add_to_cart');

//     Route::get('/dialog_cart_price', 'TourTypeHeadController@dialog_cart_price');

//     Route::get('/dialog_product_tour_stores', 'TourTypeHeadController@dialog_product_tour_stores');
//     Route::get('/dialog_prices_tour_products', 'TourTypeHeadController@dialog_prices_tour_products');

//     Route::get('/dialog_booking_tour_bookings', 'TourTypeHeadController@dialog_booking_tour_bookings');
//     Route::get('/dialog_booking_tour_payments_validations', 'TourTypeHeadController@dialog_booking_tour_payments_validations');
// });
