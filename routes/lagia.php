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
// use Illuminate\Support\Str;
// use Uasoft\Badaso\Facades\Badaso;
// use Uasoft\Badaso\Middleware\ApiRequest;
// use Uasoft\Badaso\Middleware\BadasoAuthenticate;
// use Uasoft\Badaso\Middleware\BadasoCheckPermissions;
// use Uasoft\Badaso\Middleware\BadasoCheckPermissionsForCRUD;

$api_route_prefix = \config('badaso.api_route_prefix');
Route::group(
    [
        'prefix' => $api_route_prefix,
        'namespace' => 'App\Http\Controllers',
        'as' => 'badaso.',
        'middleware' => [
            // ApiRequest::class
            // 'sanctum_1', // sama saja ->middleware(RootBadasoAuthenticate::class)
            // 'BADASO_ApiRequest' // sama saja ApiRequest::class
        ]
    ], function () {

    Route::group(['prefix' => 'v1'], function () {
        Route::group(
            [
                'prefix' => 'entities',
                'middleware' => [
                    // 'sanctum_1', // sama saja ->middleware(RootBadasoAuthenticate::class)
                    // 'BADASO_ApiRequest' // sama saja ApiRequest::class
                ]
            ], function () {
                // ROUTE dibawah ini akan override ROUTE bawaan BADASO

                Route::get('/index', '\App\Http\Controllers\Pages\IndexPageController@index');
                Route::get('/init', '\App\Http\Controllers\Pages\InitPageController@index');

                // PAGE
                Route::get('/about/read', '\App\Http\Controllers\Pages\AboutPageController@read');
                Route::get('/page-career', '\App\Http\Controllers\Pages\CareerPageController@browse');
                Route::get('/page-contact-setup/read', '\App\Http\Controllers\Pages\ContactSetupPageController@read');
                Route::get('/page-destination', '\App\Http\Controllers\Pages\DestinationPageController@browse');
                Route::get('/page-faq', '\App\Http\Controllers\Pages\FaqPageController@browse');
                Route::get('/page-gallery', '\App\Http\Controllers\Pages\GalleryPageController@browse');
                Route::get('/page-service', '\App\Http\Controllers\Pages\ServicePageController@browse');
                Route::get('/page-team', '\App\Http\Controllers\Pages\TeamPageController@browse');
                Route::get('/page-testimonial', '\App\Http\Controllers\Pages\TestimonialPageController@browse');

                // CULINARY
                Route::get('/culinary-products', '\App\Http\Controllers\Culinarys\CulinaryProductsController@browse');

                // LODGE
                Route::get('/lodge-rooms', '\App\Http\Controllers\Lodges\LodgeRoomsController@browse');

        });
    });
});
