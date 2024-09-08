<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Middleware\BadasoAuthenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['sanctum_1']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// Route::resource('orders', OrderController::class)->only(['index', 'show']);
// Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);

Route::get('/admin', function () {
    return redirect('/trevolia-dashboard');
});

Route::get('/', function () {
    return view('index');

    return str_contains('TOUR-6217ea56-f4b6', 'TOUR');
    // return bcrypt(123456);
    // $js_files = "js/badaso-c0d76f48.js js/120.js js/666.js js/861.js js/app.js js/badaso-2fd705e6.js js/badaso-5bf57e56.js js/badaso-06b53a1b.js js/badaso-7528d940.js js/badaso-433890bb.js";
    // return $js_files = explode(" ", $js_files);


    return redirect('/trevolia-dashboard');
    return view('welcome');
    $arr = explode("-", uuid());
    return strtoupper($arr[0].'-'.$arr[1]);
    return sprintf("%04s", rand(0,1000)).'-'.$arr[count($arr)-1];

    // ADDITIONAL BULK DELETE
    // -------------------------------------------- //
    $filters = TravelReservations::whereIn('id', [35,34,33])->with('travelTickets')->get();
    // return dump($filters[1]);
    $temp = [];
    // for ($i=0; $i < count($filters); $i++) {
    //     dump($filters[$i]);
    //     # code...
    // }
    foreach ($filters as $value) {
        // dump($value);
        if($value->travelTickets == null) {
            array_push($temp, $value);
        }
    }
    return $temp;
    //return User::all();
    //return view('welcome');
});

// Route::get('/trevolia-api/v1/table/relation-data-by-slug', function () {
//     return 111;
//     //return view('welcome');
// });

// Route::group(['prefix' => ''], function ($request) {
//     // dd(request('slug'));
//     Route::get('/trevolia-api/v1/table/relation-data-by-slug', function () {
//         return 111;
//         //return view('welcome');
//     });

//     // switch ($request('slug')) {
//     //     case 'campus-bookings':
//     //         Illuminate\Support\Facades\

//     //         // Route::get('/relation-data-by-slug', 'BadasoTableController@getRelationDataBySlug')
//     //         break;

//     //     default:
//     //         # code...
//     //         break;
//     // }
//     // Route::get('/data-type', 'BadasoTableController@getDataType')->middleware(BadasoAuthenticate::class);
//     // Route::get('/', 'BadasoTableController@browse')->middleware(BadasoAuthenticate::class);
//     // Route::get('/read', 'BadasoTableController@read')->middleware(BadasoAuthenticate::class);
//     // Route::get('/data', 'BadasoTableController@getDataByTable')->middleware(BadasoAuthenticate::class);
//     // Route::get('/generate-crud', 'BadasoTableController@generateCRUD')->middleware(BadasoAuthenticate::class);
//     // Route::get('/relation-data-by-slug', 'BadasoTableController@getRelationDataBySlug')->middleware(BadasoAuthenticate::class);
// });


// Route::get('/send-email',function(){
//     $data = [
//         'name' => 'Syahrizal As',
//         'body' => 'Testing Kirim Email di Santri Koding'
//     ];

//     Mail::to('muhamadduki@gmail.com')->send(new TestMail($data));

//     dd("Email Berhasil dikirim.");
// });



// WAJIB ADA di SPA
Route::get('{any}', function () {
    return view('index');
})->where('any','.*');
