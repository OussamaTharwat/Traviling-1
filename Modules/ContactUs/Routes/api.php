<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\ContactUs\Http\Controllers\ContactSettingController;
use Modules\ContactUs\Http\Controllers\ContactUsController;
use Modules\ContactUs\Http\Controllers\PublicContactUsController;
use Modules\Role\Helpers\PermissionHelper;

Route::group(['prefix' => 'admin/contact_us', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('/', [ContactUsController::class, 'index'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('all', 'contact_us'));

    Route::get('/{id}', [ContactUsController::class, 'show'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('show', 'contact_us'));

    Route::delete('/{id}', [ContactUsController::class, 'destroy'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('delete', 'contact_us'));
});

Route::group(['prefix' => 'public/contact_us'], function () {
    Route::post('', [PublicContactUsController::class, 'store']);
});



//admin create url google map
Route::group(['prefix' => 'web'], function () {
    Route::get('contact_settings', [ContactSettingController::class, 'get']);
});
//admin create url google map
Route::group(['prefix' => 'admin/contact_settings', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('', [ContactSettingController::class, 'get'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('all', 'contact_us'));
    Route::post('', [ContactSettingController::class, 'update'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('update', 'contact_us'));
});
