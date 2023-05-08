<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

// route for AuthController
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logging', [AuthController::class, 'logging'])->name('auth.logging');
Route::get('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot-password');
Route::get('/auth/new-password', [AuthController::class, 'newPassword'])->name('auth.new-password');
Route::get('/auth/my-profile', [AuthController::class, 'myProfile'])->name('auth.my-profile');

Route::resource('/auth/device', DeviceController::class)->names([
    'index' => 'auth.device.index',
    'create' => 'auth.device.create',
    'edit' => 'auth.device.edit',
    'update' => 'auth.device.update',
    'show' => 'auth.device.show',
    'destroy' => 'auth.device.destroy',
]);

Route::resource('/auth/service', ServiceController::class)->names([
    'index' => 'auth.service.index',
    'create' => 'auth.service.create',
    'edit' => 'auth.service.edit',
    'update' => 'auth.service.update',
    'show' => 'auth.service.show',
    'destroy' => 'auth.service.destroy',
]);

Route::resource('/auth/queue', QueueController::class)->names([
    'index' => 'auth.queue.index',
    'create' => 'auth.queue.create',
    'update' => 'auth.queue.update',
    'show' => 'auth.queue.show',
    'destroy' => 'auth.queue.destroy',
]);

Route::get('/auth/report', function () {
    $records = [
        (object)[
            'name' => 'Báo cáo'
        ]
    ];
    return view('pages/report/index',['records' => $records]);
})->name('auth.report.index');

Route::get('/system/history_user', function () {
    $records = [
        (object)[
            'name' => 'Cài đặt hệ thống'
        ]
    ];
    return view('pages/report/history_user', ['records' => $records]);
})->name('system.history_user');

Route::resource('/system/user', UserController::class)->names([
    'index' => 'system.user.index',
    'create' => 'system.user.create',
    'edit' => 'system.user.edit',
    'update' => 'system.user.update',
    'destroy' => 'system.user.destroy',
]);

Route::resource('/system/role', RoleController::class)->names([
    'index' => 'system.role.index',
    'create' => 'system.role.create',
    'store' => 'system.role.store',
    'edit' => 'system.role.edit',
    'update' => 'system.role.update',
    'destroy' => 'system.role.destroy',
]);