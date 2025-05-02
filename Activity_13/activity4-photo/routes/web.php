<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::post('/upload-single', [ImageController::class, 'uploadSingle'])->name('images.upload.single');
Route::post('/upload-multiple', [ImageController::class, 'uploadMultiple'])->name('images.upload.multiple');
Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');


