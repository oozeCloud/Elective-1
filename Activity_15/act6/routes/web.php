<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PokemonApiController;

Route::get('/pokemon-search', [PokemonApiController::class, 'showForm']);
Route::post('/pokemon-search', [PokemonApiController::class, 'handleForm'])->name('pokemon.search');


