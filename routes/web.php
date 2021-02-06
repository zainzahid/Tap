<?php

use Illuminate\Support\Facades\Route;

use App\Models\TappTblClient;
use App\Http\Controllers\SMS\SingleSMSController;
use App\Http\Controllers\SMS\BulkSMSController;
use App\Http\Controllers\SMS\DeliverSmsController;
use App\Http\Controllers\SMS\PendingSmsController;
use App\Http\Controllers\SMS\RecieveSmsController;
use App\Http\Controllers\TwilioNumberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/', function () {
//     $clients = TappTblClient::all();
//     // dd($clients);
//     return view('welcome', [
//         'clients' => $clients
//     ]);
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/single-sms', [SingleSMSController::class, 'index'])->name('single-sms');
Route::post('/single-sms', [SingleSMSController::class, 'sendSms']);

Route::get('/bulk-sms', [BulkSMSController::class, 'index'])->name('bulk-sms');
Route::post('/bulk-sms', [BulkSMSController::class, 'store']);

Route::get('/deliver-sms', [DeliverSmsController::class, 'index'])->name('deliver-sms');
Route::get('/pending-sms', [PendingSmsController::class, 'index'])->name('pending-sms');

Route::get('/recieve-sms', [RecieveSmsController::class, 'index'])->name('recieve-sms');;
Route::post('/log-sms', [RecieveSmsController::class, 'logSms']);

Route::get('/twilio-number', [TwilioNumberController::class, 'index'])->name('twilio-number');
Route::post('/twilio-number', [TwilioNumberController::class, 'store']);

Route::get('/buy', [PaymentController::class, 'index'])->name('buy');

Route::get('payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('payment/{amount}', [PaymentController::class, 'payment'])->name('payment');
Route::get('cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');


Route::resource('users', 'UserController');
