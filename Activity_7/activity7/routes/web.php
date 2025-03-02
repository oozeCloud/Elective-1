<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\interpretController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/interpret/{number}', [interpretController::class, 'interpre']);
