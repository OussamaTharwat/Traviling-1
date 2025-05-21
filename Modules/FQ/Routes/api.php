<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\FQ\Http\Controllers\FQDashboardController;
use Modules\Role\Helpers\PermissionHelper;

Route::group(['prefix' => 'admin/fq', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('/', [FQDashboardController::class, 'index'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('all', 'Fq'));
    Route::get('/{id}', [FQDashboardController::class, 'show'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('show', 'Fq'));
    Route::post('/', [FQDashboardController::class, 'store'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('store', 'Fq'));
    Route::post('/{id}', [FQDashboardController::class, 'update'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('update', 'Fq'));
    Route::delete('/{id}', [FQDashboardController::class, 'destroy'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('delete', 'Fq'));
});
Route::group(['prefix' => 'web'], function () {
    Route::get('fq', [FQDashboardController::class, 'index']);
});
