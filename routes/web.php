<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Table1Controller;
use App\Http\Controllers\Table2Controller;
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

Route::controller(Table1Controller::class)->group(function() {
    Route::get('/booking-table1', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table1/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table1', 'store')->middleware('isMember');
});

Route::controller(Table2Controller::class)->group(function() {
    Route::get('/booking-table2', 'showJadwal')->middleware('isMember');
    Route::get('/pembayaran-table2/{tanggal}/{jam}', 'showPembayaran');

    Route::post('/booking-table2', 'store')->middleware('isMember');
});

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

Route::resource('/table1', Table1Controller::class)->middleware('isAdmin');
Route::controller(Table1Controller::class)->group(function() {
    Route::post('/set-status-booking1/{table1}', 'setStatusBooking');
    Route::post('/set-status-pembayaran1/{table1}', 'setStatusPembayaran');
});