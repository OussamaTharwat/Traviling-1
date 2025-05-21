<?php

use Illuminate\Support\Facades\Route;
use Modules\Rent\Http\Controllers\PropertyController;
use Modules\Rent\Http\Controllers\ReservationController;

Route::middleware(['auth:api'])->group(function () {
    // Properties APIs (any user can create/list/edit/delete his properties)
    Route::get('properties', [PropertyController::class, 'index']);
    Route::post('properties', [PropertyController::class, 'store']);
    Route::get('properties/{id}', [PropertyController::class, 'show']);
    Route::put('properties/{id}', [PropertyController::class, 'update']);
    Route::delete('properties/{id}', [PropertyController::class, 'destroy']);

    // Reservations APIs (any user can book or see their bookings)
    Route::get('reservations', [ReservationController::class, 'index']);
    Route::post('reservations', [ReservationController::class, 'store']);
    Route::get('reservations/{id}', [ReservationController::class, 'show']);
    Route::put('reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy']);
});
