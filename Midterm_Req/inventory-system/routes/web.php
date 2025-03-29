<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::get('/asset', [AssetController::class, 'index']);
Route::get('/asset/create', [AssetController::class, 'create']);
Route::post('/asset/store', [AssetController::class, 'store']);
Route::get('/asset/{id}/view', [AssetController::class, 'show']);
Route::get('/asset/{id}/edit', [AssetController::class, 'edit']);
Route::post('/asset/{id}/update', [AssetController::class, 'update']);
Route::get('/asset/{id}/delete', [AssetController::class, 'destroy']);
Route::get('/locations', [AssetController::class, 'locations']);
Route::get('/maintenance/{id}', [AssetController::class, 'maintenanceHistory']);

