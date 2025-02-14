<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientManagement\app\Http\Controllers\ClientManagementController;

Route::prefix('Client')->group(function () {
    Route::post('StoreClientDetails', [ClientManagementController::class, 'store']);
    Route::get('AllClientDetails', [ClientManagementController::class, 'allClients']);
    Route::put('UpdateClientDetails/{id}', [ClientManagementController::class, 'update']);
    Route::delete('DeleteClientDetails/{id}', [ClientManagementController::class, 'destroy']);
});

// API Resource for client management
Route::apiResource('clientmanagement', ClientManagementController::class)->names('clientmanagement');
