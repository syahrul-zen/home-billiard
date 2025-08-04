<?php

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
    return view('Admin.Layouts.main');
});

Route::get('booking-table2', function () {
    return view('Member.bTable2');
});