<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\Role\Helpers\PermissionHelper;
use Modules\Role\Http\Controllers\AdminRoleController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::group(['prefix' => 'admin/roles', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('', [AdminRoleController::class, 'index'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('all', 'roles'));

    Route::get('{id}', [AdminRoleController::class, 'show'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('show', 'roles'));

    Route::post('', [AdminRoleController::class, 'store'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('store', 'roles'));

    Route::put('{id}', [AdminRoleController::class, 'update'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('update', 'roles'));

    Route::delete('{id}', [AdminRoleController::class, 'destroy'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('delete', 'roles'));
});

    Route::group(['prefix' => 'select-menu/roles'], function () {
        Route::get('', [AdminRoleController::class, 'roles']);
    });

    Route::group(['prefix' => 'select-menu/permissions'], function () {
        Route::get('', [AdminRoleController::class, 'permissions']);
    });
