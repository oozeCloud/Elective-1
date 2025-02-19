<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathController;

// Dito natin dini-define ang ruta para tanggapin ang dalawang set ng operasyon at numero
Route::get('/{num1}/{operation1}/{num2}/{num3}/{operation2}/{num4}', [MathController::class, 'calculate']);

