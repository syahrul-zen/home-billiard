<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Table1Controller;
use App\Http\Controllers\Table2Controller;
use App\Http\Controllers\Table3Controller;
use App\Http\Controllers\Table4Controller;
use App\Http\Controllers\Table5Controller;
use App\Http\Controllers\Table6Controller;
use App\Http\Controllers\MemberController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Member.index');
});

Route::get('booking-table1', function ()    {
    return view('Member.bTable1');
});

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});

// Route::get('booking-table2', function () {
//     return view('Member.bTable2');
// });

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login');
    Route::get('/register', 'register');
    Route::post('/register', 'createMember');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

// Booking Table 1
Route::controller(Table1Controller::class)->group(function() {
    Route::get('/booking-table1', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table1/{tanggal}/{jam}', 'showPembayaran');
    Route::post('/booking-table1', 'store')->middleware('isMember');
});

// CRUD Booking Table 1 Admin :
Route::resource('/table1', Table1Controller::class)->middleware('isAdmin');
Route::controller(Table1Controller::class)->group(function() {
    Route::post('/set-status-booking1/{table1}', 'setStatusBooking');
    Route::post('/set-status-pembayaran1/{table1}', 'setStatusPembayaran');
});

// Booking Table 2
Route::controller(Table2Controller::class)->group(function() {
    Route::get('/booking-table2', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table2/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table2', 'store')->middleware('isMember');
});

// CRUD Booking Table 2 Admin :
Route::resource('/table2', Table2Controller::class)->middleware('isAdmin');
Route::controller(Table2Controller::class)->group(function() {
    Route::post('/set-status-booking2/{table2}', 'setStatusBooking');
    Route::post('/set-status-pembayaran2/{table2}', 'setStatusPembayaran');
});

// Booking Table 3
Route::controller(Table3Controller::class)->group(function() {
    Route::get('/booking-table3', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table3/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table3', 'store')->middleware('isMember');
});

// CRUD Booking Table 3 Admin :
Route::resource('/table3', Table3Controller::class)->middleware('isAdmin');
Route::controller(Table3Controller::class)->group(function() {
    Route::post('/set-status-booking3/{table3}', 'setStatusBooking');
    Route::post('/set-status-pembayaran3/{table3}', 'setStatusPembayaran');
});

// Booking Table 4
Route::controller(Table4Controller::class)->group(function() {
    Route::get('/booking-table4', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table4/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table4', 'store')->middleware('isMember');
});

// CRUD Booking Table 4 Admin :
Route::resource('/table4', Table4Controller::class)->middleware('isAdmin');
Route::controller(Table4Controller::class)->group(function() {
    Route::post('/set-status-booking4/{table4}', 'setStatusBooking');
    Route::post('/set-status-pembayaran4/{table4}', 'setStatusPembayaran');
});

// Booking Table 5
Route::controller(Table5Controller::class)->group(function() {
    Route::get('/booking-table5', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table5/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table5', 'store')->middleware('isMember');
});

// CRUD Booking Table 5 Admin :
Route::resource('/table5', Table5Controller::class)->middleware('isAdmin');
Route::controller(Table5Controller::class)->group(function() {
    Route::post('/set-status-booking5/{table5}', 'setStatusBooking');
    Route::post('/set-status-pembayaran5/{table5}', 'setStatusPembayaran');
});

// Booking Table 6
Route::controller(Table6Controller::class)->group(function() {
    Route::get('/booking-table6', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table6/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table6', 'store')->middleware('isMember');
});

// CRUD Booking Table 6 Admin :
Route::resource('/table6', Table6Controller::class)->middleware('isAdmin');
Route::controller(Table6Controller::class)->group(function() {
    Route::post('/set-status-booking6/{table6}', 'setStatusBooking');
    Route::post('/set-status-pembayaran6/{table6}', 'setStatusPembayaran');
});

// Booking Table 6
Route::controller(Table6Controller::class)->group(function() {
    Route::get('/booking-table6', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table6/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table6', 'store')->middleware('isMember');
});

// CRUD Booking Table 6 Admin :
Route::resource('/table6', Table6Controller::class)->middleware('isAdmin');
Route::controller(Table6Controller::class)->group(function() {
    Route::post('/set-status-booking6/{table6}', 'setStatusBooking');
    Route::post('/set-status-pembayaran6/{table6}', 'setStatusPembayaran');
});

// ======================================================================================


Route::get('/test1', function() {
    return Auth::guard('member')->user();
});

Route::get('/test2', function() {
    return Auth::guard('admin')->user();
});

Route::controller(MemberController::class)->group(function() {
    Route::get('/profile', 'show')->middleware('isMember');
    // Route::post('/profile', 'updateProfile')->middleware('isMember');
});

