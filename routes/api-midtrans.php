<?php

use App\Http\Controllers\MidtransController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Middleware\ApiRequest;
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

// Route::get('/midtrans/index', [OrderController::class, 'index']);
// Route::post('/midtrans/checkout', [OrderController::class, 'checkout'])->name('midtrans.checkout');

// Route::resource('orders', OrderController::class)->only(['index', 'show']);
// Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);


// MIDTRANS Callback
// https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration
// hanya bisa saat online dengan domain
Route::get('midtrans/finish', [MidtransController::class, 'finish'])
    ->name('midtrans.finish');

Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish'])
    ->name('midtrans.unfinish');

Route::get('midtrans/error', [MidtransController::class, 'error'])
    ->name('midtrans.error');

Route::post('midtrans/finish', [MidtransController::class, 'finish'])
    ->name('midtrans.finish');

Route::post('midtrans/unfinish', [MidtransController::class, 'unfinish'])
    ->name('midtrans.unfinish');

Route::post('midtrans/error', [MidtransController::class, 'error'])
    ->name('midtrans.error');


Route::get('/apasih', function() {
    return 11111;
});

Route::post('/apasih/post', function(Request $request) {
    return 111;
    return $request->getContent();
}); //->middleware('cors');

// Route::group([
//     'middleware' => ['api', 'cors'],
//     'namespace' => '',
//     'prefix' => '',
// ], function ($router) {
//      //Add you routes here, for example:

//     Route::get('/apasih', function() {
//         return 11111;
//     });

//     Route::post('/apasih/post', function(Request $request) {
//         return $request->getContent();
//     }); //->middleware('cors');
// });

// Payment Notification URL*
Route::post('payment_notifikasi/payment_notification',  [MidtransController::class, 'notifikasi'])->name('payment_notification');
// Recurring Notification URL*
Route::post('payment_notifikasi/recurring_notification',  [MidtransController::class, 'notifikasi'])->name('recurring_notification');
// Pay Account Notification URL*
Route::post('payment_notifikasi/pay_account_notification',  [MidtransController::class, 'notifikasi'])->name('pay_account_notification');

// CUSTOM
Route::get('proyek/{id}/show', [MidtransController::class, 'show']);
Route::get('proyek/{project_id}/history', [MidtransController::class, 'history']);
Route::get('proyek/{id}/order', [MidtransController::class, 'order']);
Route::get('proyek/{order_id}/validasi', [MidtransController::class, 'validasi']);
