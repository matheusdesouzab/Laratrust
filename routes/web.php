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

require_once __DIR__ . '/fortify.php';

Route::middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::group(['prefix' => 'permissions-roles'], function () {
        Route::controller(PermissionRoleController::class)->group(function () {
            Route::get('create', 'create')->name('permissions-roles.create');
            Route::post('', 'store')->name('permissions-roles.store');
            Route::delete('{role_id}/{permission_id}', 'destroy')->name('permissions-roles.destroy');
        });
    });

    Route::group(['prefix' => 'users'], function () {
        //Route::controller(UserController::class)->middleware('role:admin')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('', 'index')->name('users.index');
            Route::get('create', 'create')->name('users.create');
            Route::get('{id}/edit', 'edit')->name('users.edit');
            Route::get('{id}', 'show')->name('users.show');
            Route::post('', 'store')->name('users.store');
            Route::post('add-role', 'addRole')->name('users.add-role');
            Route::delete('remove-role-user/{role_id}/{user_id}', 'removeRole')->name('users.remove-rule-user.destroy');
            Route::put('', 'update')->name('users.update');
        });
    });
});
