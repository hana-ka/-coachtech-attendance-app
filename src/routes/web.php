<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/attendance', function () {
    return view('attendance.index');
});

Route::get('/attendance/list', function () {
    return view('attendance.list');
});

Route::get('/stamp_correction_request/list', function () {
    return view('correction_request.list');
});


Route::get('/attendance/detail', function () {
    return view('attendance.detail');
});

Route::get('/admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/admin/attendance/list', function () {
    return view('admin.attendance.list');
});

Route::get('admin/attendance', function () {
    return view('admin.attendance.detail');
});

Route::get('/admin/staff/list', function () {
    return view('admin.user.list');
});

Route::get('/admin/attendance/staff', function () {
    return view('admin.attendance.user_list');
});

Route::get('/stamp_correction_request/list', function () {
    return view('admin.correction_request.list');
});

Route::get('/stamp_correction_request/approve', function () {
    return view('admin.correction_request.detail');
});