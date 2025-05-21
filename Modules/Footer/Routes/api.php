<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\Footer\Http\Controllers\FooterController;

Route::group(['prefix' => 'admin/footers', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('/', [FooterController::class, 'index']);
    Route::post('', [FooterController::class, 'update']);
});
Route::group(['prefix' => 'web/footers'], function () {
    Route::get('', [FooterController::class, 'index']);
});
