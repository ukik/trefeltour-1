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
                Route::get('/init/provinsi', '\App\Http\Controllers\Pages\InitPageController@provinsi');

                Route::get('/init/province', '\App\Http\Controllers\Pages\InitPageController@province');

                // PAGE
                Route::get('/about', '\App\Http\Controllers\Pages\AboutPageController@browse');
                Route::get('/about/read', '\App\Http\Controllers\Pages\AboutPageController@read');
                Route::get('/page-career', '\App\Http\Controllers\Pages\CareerPageController@browse');
                Route::get('/page-career/read', '\App\Http\Controllers\Pages\CareerPageController@read');
                Route::get('/page-contact-setup', '\App\Http\Controllers\Pages\ContactSetupPageController@browse');
                Route::get('/page-contact-setup/read', '\App\Http\Controllers\Pages\ContactSetupPageController@read');
                Route::get('/page-destination', '\App\Http\Controllers\Pages\DestinationPageController@browse');
                Route::get('/page-destination/read', '\App\Http\Controllers\Pages\DestinationPageController@read');
                Route::get('/page-faq', '\App\Http\Controllers\Pages\FaqPageController@browse');
                Route::get('/page-faq/read', '\App\Http\Controllers\Pages\FaqPageController@read');
                Route::get('/page-gallery', '\App\Http\Controllers\Pages\GalleryPageController@browse');
                Route::get('/page-gallery/read', '\App\Http\Controllers\Pages\GalleryPageController@read');
                Route::get('/page-service', '\App\Http\Controllers\Pages\ServicePageController@browse');
                Route::get('/page-service/read', '\App\Http\Controllers\Pages\ServicePageController@read');
                Route::get('/page-team', '\App\Http\Controllers\Pages\TeamPageController@browse');
                Route::get('/page-team/read', '\App\Http\Controllers\Pages\TeamPageController@read');
                Route::get('/page-testimonial', '\App\Http\Controllers\Pages\TestimonialPageController@browse');
                Route::get('/page-testimonial/read', '\App\Http\Controllers\Pages\TestimonialPageController@read');
                Route::get('/page-info', '\App\Http\Controllers\Pages\InfoPageController@browse');
                Route::get('/page-info/read', '\App\Http\Controllers\Pages\InfoPageController@read');


                Route::get('/page-customer/read/lagia', '\App\Http\Controllers\Pages\CustomerPageController@lagia_read')->middleware(RootBadasoAuthenticate::class);

                // CULINARY
                Route::get('/culinary-products', '\App\Http\Controllers\Culinarys\CulinaryProductsController@browse');
                Route::get('/culinary-products/read', '\App\Http\Controllers\Culinarys\CulinaryProductsController@read');
                Route::get('/culinary-stores', '\App\Http\Controllers\Culinarys\CulinaryStoresController@browse');
                Route::get('/culinary-stores/read', '\App\Http\Controllers\Culinarys\CulinaryStoresController@read');
                Route::get('/culinary-prices', '\App\Http\Controllers\Culinarys\CulinaryPricesController@browse');
                Route::get('/culinary-prices/read', '\App\Http\Controllers\Culinarys\CulinaryPricesController@read');

                // TOUR
                // Route::get('/tour-products', '\App\Http\Controllers\Tours\TourProductsController@browse');
                Route::get('/tour-products/lagia', '\App\Http\Controllers\Tours\TourProductsController@lagia_browse');
                Route::get('/tour-products/read', '\App\Http\Controllers\Tours\TourProductsController@read');
                Route::get('/tour-stores', '\App\Http\Controllers\Tours\TourStoresController@browse');
                Route::get('/tour-stores/read', '\App\Http\Controllers\Tours\TourStoresController@read');
                Route::get('/tour-prices', '\App\Http\Controllers\Tours\TourPricesController@browse');
                Route::get('/tour-prices/read', '\App\Http\Controllers\Tours\TourPricesController@read');
                Route::get('/tour-booking-payments/read', '\App\Http\Controllers\Tours\TourBookingsPaymentsController@read_lagia');

                // LODGE
                Route::get('/lodge-facility', '\App\Http\Controllers\Lodges\LodgeFacilityController@browse');
                Route::get('/lodge-facility/read', '\App\Http\Controllers\Lodges\LodgeFacilityController@read');
                Route::get('/lodge-prices', '\App\Http\Controllers\Lodges\LodgePricesController@browse');
                Route::get('/lodge-prices/read', '\App\Http\Controllers\Lodges\LodgePricesController@read');
                Route::get('/lodge-profiles', '\App\Http\Controllers\Lodges\LodgeProfilesController@browse');
                Route::get('/lodge-profiles/read', '\App\Http\Controllers\Lodges\LodgeProfilesController@read');
                Route::get('/lodge-rooms', '\App\Http\Controllers\Lodges\LodgeRoomsController@browse');
                Route::get('/lodge-rooms/read', '\App\Http\Controllers\Lodges\LodgeRoomsController@read');
                Route::get('/lodge-staffs', '\App\Http\Controllers\Lodges\LodgeStaffsController@browse');
                Route::get('/lodge-staffs/read', '\App\Http\Controllers\Lodges\LodgeStaffsController@read');

                // SOUVENIR
                Route::get('/souvenir-products', '\App\Http\Controllers\Souvenirs\SouvenirProductsController@browse');
                Route::get('/souvenir-products/read', '\App\Http\Controllers\Souvenirs\SouvenirProductsController@read');
                Route::get('/souvenir-stores', '\App\Http\Controllers\Souvenirs\SouvenirStoresController@browse');
                Route::get('/souvenir-stores/read', '\App\Http\Controllers\Souvenirs\SouvenirStoresController@read');
                Route::get('/souvenir-prices', '\App\Http\Controllers\Souvenirs\SouvenirPricesController@browse');
                Route::get('/souvenir-prices/read', '\App\Http\Controllers\Souvenirs\SouvenirPricesController@read');

                // TALENT
                Route::get('/talent-skills', '\App\Http\Controllers\Talents\TalentSkillsController@browse');
                Route::get('/talent-skills/read', '\App\Http\Controllers\Talents\TalentSkillsController@read');
                Route::get('/talent-profiles', '\App\Http\Controllers\Talents\TalentProfilesController@browse');
                Route::get('/talent-profiles/read', '\App\Http\Controllers\Talents\TalentProfilesController@read');
                Route::get('/talent-prices', '\App\Http\Controllers\Talents\TalentPricesController@browse');
                Route::get('/talent-prices/read', '\App\Http\Controllers\Talents\TalentPricesController@read');

                // TOURISM
                Route::get('/tourism-facilities', '\App\Http\Controllers\Tourisms\TourismFacilitiesController@browse');
                Route::get('/tourism-facilities/read', '\App\Http\Controllers\Tourisms\TourismFacilitiesController@read');
                Route::get('/tourism-services', '\App\Http\Controllers\Tourisms\TourismServicesController@browse');
                Route::get('/tourism-services/read', '\App\Http\Controllers\Tourisms\TourismServicesController@read');
                Route::get('/tourism-venues', '\App\Http\Controllers\Tourisms\TourismVenuesController@browse');
                Route::get('/tourism-venues/read', '\App\Http\Controllers\Tourisms\TourismVenuesController@read');
                Route::get('/tourism-prices', '\App\Http\Controllers\Tourisms\TourismPricesController@browse');
                Route::get('/tourism-prices/read', '\App\Http\Controllers\Tourisms\TourismPricesController@read');

                // TRANSPORT
                Route::get('/transport-drivers', '\App\Http\Controllers\Transports\TransportDriversController@browse');
                Route::get('/transport-drivers/read', '\App\Http\Controllers\Transports\TransportDriversController@read');
                Route::get('/transport-maintenances', '\App\Http\Controllers\Transports\TransportMintenancesController@browse');
                Route::get('/transport-maintenances/read', '\App\Http\Controllers\Transports\TransportMintenancesController@read');
                Route::get('/transport-prices', '\App\Http\Controllers\Transports\TransportPricesController@browse');
                Route::get('/transport-prices/read', '\App\Http\Controllers\Transports\TransportPricesController@read');
                Route::get('/transport-rentals', '\App\Http\Controllers\Transports\TransportRentalsController@browse');
                Route::get('/transport-rentals/read', '\App\Http\Controllers\Transports\TransportRentalsController@read');
                Route::get('/transport-returns', '\App\Http\Controllers\Transports\TransportReturnsController@browse');
                Route::get('/transport-returns/read', '\App\Http\Controllers\Transports\TransportReturnsController@read');
                Route::get('/transport-vehicles', '\App\Http\Controllers\Transports\TransportVehiclesController@browse');
                Route::get('/transport-vehicles/read', '\App\Http\Controllers\Transports\TransportVehiclesController@read');
                Route::get('/transport-workshops', '\App\Http\Controllers\Transports\TransportWorkshopsController@browse');
                Route::get('/transport-workshops/read', '\App\Http\Controllers\Transports\TransportWorkshopsController@read');
            });
    });
});
