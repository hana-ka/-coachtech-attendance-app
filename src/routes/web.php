<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CorrectionRequestController;
use App\Http\Controllers\Admin\AdminAttendanceController;
use App\Http\Controllers\Admin\AdminUserController;


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

Route::get('/admin/login', function (Request $request) {
    return app(LoginViewResponse::class);
});

Route::middleware('auth')->group(function () {

    Route::get('/attendance', [AttendanceController::class, 'index']);

    Route::post('/attendance/clock-in', [AttendanceController::class, 'clockIn']);

    Route::post('/break/start', [AttendanceController::class, 'breakStart']);

    Route::post('/break/end', [AttendanceController::class, 'breakEnd']);

    Route::post('/attendance/clock-out', [AttendanceController::class, 'clockOut']);

    Route::get('/attendance/list', [AttendanceController::class, 'list']);

    Route::get(
    '/attendance/detail/{id}',
    [AttendanceController::class, 'show'])->name('attendance.detail');

    Route::post(
    '/attendance/correction/{id}',
    [CorrectionRequestController::class, 'store'])->name('correction.store');

    Route::get(
    '/admin/attendance/list',
    [AdminAttendanceController::class, 'index'])->name('admin.attendance.list');

    Route::get(
    '/admin/attendance/{id}',
    [AdminAttendanceController::class, 'show'])->name('admin.attendance.detail');

    Route::get(
    '/admin/staff/list',
    [AdminUserController::class, 'index'])
    ->name('admin.staff.list');

    Route::get(
    '/admin/attendance/staff/{id}',
    [AdminUserController::class, 'attendance'])->name('admin.staff.attendance');

});

Route::get('/stamp_correction_request/list', function () {
    return view('correction_request.list');
});


Route::get('/stamp_correction_request/list', function () {
    return view('admin.correction_request.list');
});

Route::get('/stamp_correction_request/approve', function () {
    return view('admin.correction_request.detail');
});