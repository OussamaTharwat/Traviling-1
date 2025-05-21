<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\UploadFile\Http\Controllers\UploadFileController;

Route::group(['prefix' => 'admin/upload_files', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('/', [UploadFileController::class, 'index']);
    Route::get('/{id}', [UploadFileController::class, 'show']);
    Route::post('/', [UploadFileController::class, 'store']);
    Route::post('/{id}', [UploadFileController::class, 'update']);
    Route::delete('/{id}', [UploadFileController::class, 'destroy']);
});
Route::group(['prefix' => 'web/upload_files'], function () {
    Route::get('', [UploadFileController::class, 'index']);
});
