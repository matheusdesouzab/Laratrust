<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

Route::controller(PermissionRoleController::class)->group(function () {
    Route::get('create', 'create')->name('permissions-roles.create');
    Route::post('', 'store')->name('permissions-roles.store');
    Route::delete('{role_id}/{permission_id}', 'destroy')->name('permissions-roles.destroy');
});

