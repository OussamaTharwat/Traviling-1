<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\AboutUs\Http\Controllers\AboutUsController;
use Modules\Role\Helpers\PermissionHelper;

Route::group(['prefix' => 'admin/about_us' , 'middleware' => GeneralHelper::adminMiddlewares()], function () {
    Route::get('', [AboutUsController::class, 'show'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('show', 'about_us'));
    Route::post('', [AboutUsController::class, 'update'])
        ->middleware(PermissionHelper::getPermissionNameMiddleware('update', 'about_us'));
});


Route::group(['prefix'=> 'web'], function() {
    Route::get('about-us', [AboutUsController::class, 'show']);
});
