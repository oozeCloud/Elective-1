<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Auth;

Route::get('/asset/login', [AssetController::class, 'showLogin'])->name('login');

Route::post('/asset/login', [AssetController::class, 'login'])->name('login.post');

Route::post('/asset/logout', [AssetController::class, 'logout'])->name('logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/asset', [AssetController::class, 'index']);
    Route::get('/asset/{id}/create', [AssetController::class, 'create']);
    Route::post('/asset/store', [AssetController::class, 'store']);
    Route::get('/asset/{id}/view', [AssetController::class, 'show']);
    Route::get('/asset/{id}/edit', [AssetController::class, 'edit']);
    Route::post('/asset/{id}/update', [AssetController::class, 'update']);
    Route::post('/asset/{id}/{locationId}/delete', [AssetController::class, 'destroy']);
    Route::get('/locations', [AssetController::class, 'locations']);
    Route::post('/locations', [AssetController::class, 'storeLocation']);
    Route::get('/locations/create', [AssetController::class, 'addLocation']);
    Route::get('/locations/{id}/view', [AssetController::class, 'viewLocation']);
    Route::get('/maintenance/{id}', [AssetController::class, 'maintenanceHistory']);
    Route::get('/locations/{id}/edit', [AssetController::class, 'editLocation']);
    Route::put('/locations/{id}/update', [AssetController::class, 'updateLocation']);
    Route::delete('/locations/{id}/delete', [AssetController::class, 'destroyLocation']);
    Route::get('/account', [AssetController::class, 'editAccount'])->name('account.edit');
    Route::put('/account', [AssetController::class, 'updateAccount'])->name('account.update');
});

