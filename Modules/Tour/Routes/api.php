<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\Tour\Http\Controllers\TourAdminController;
use Modules\Tour\Http\Controllers\TourController;

Route::group(['prefix' => 'admin/tours', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('', [TourAdminController::class, 'index']);
    Route::get('{id}', [TourAdminController::class, 'show']);
    Route::post('', [TourAdminController::class, 'store']);
    Route::post('{id}', [TourAdminController::class, 'update']);
    Route::delete('{id}', [TourAdminController::class, 'delete']);
});
Route::group(['prefix' => 'web/tours'], function () {
    Route::get('', [TourController::class, 'index']);
});
