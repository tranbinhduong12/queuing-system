<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\ticket;
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
Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logging', [AuthController::class, 'logging'])->name('admin.logging');
Route::get('/admin/forgot-password', [AuthController::class, 'forgotPassword'])->name('admin.forgot-password');
Route::get('/admin/new-password', [AuthController::class, 'newPassword'])->name('admin.new-password');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin', [AuthController::class, 'myProfile'])->name('admin.my-profile');

    Route::resource('/admin/device', DeviceController::class)->names([
        'index' => 'admin.device.index',
        'create' => 'admin.device.create',
        'store' => 'admin.device.store',
        'edit' => 'admin.device.edit',
        'update' => 'admin.device.update',
        'show' => 'admin.device.show',
        'destroy' => 'admin.device.destroy',
    ]);

    Route::resource('/admin/service', ServiceController::class)->names([
        'index' => 'admin.service.index',
        'create' => 'admin.service.create',
        'store' => 'admin.service.store',
        'edit' => 'admin.service.edit',
        'update' => 'admin.service.update',
        'show' => 'admin.service.show',
        'destroy' => 'admin.service.destroy',
    ]);

    Route::resource('/admin/queue', QueueController::class)->names([
        'index' => 'admin.queue.index',
        'create' => 'admin.queue.create',
        'store' => 'admin.queue.store',
        'show' => 'admin.queue.show',
        'destroy' => 'admin.queue.destroy',
    ]);

    Route::get('/admin/report', [ReportController::class, 'report'])->name('admin.report.index');

    Route::get('/system/history_user', [ReportController::class, 'history_user'])->name('system.history_user');

    Route::resource('/system/user', UserController::class)->names([
        'index' => 'system.user.index',
        'create' => 'system.user.create',
        'store' => 'system.user.store',
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
});
