<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonApiController extends Controller
{
    public function showForm()
    {
        return view('pokemon.search');
    }

    public function handleForm(Request $request)
    {
        $name = strtolower($request->input('name'));

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");

        if ($response->successful()) {
            $pokemon = $response->json();
            return view('pokemon.search', compact('pokemon'));
        } else {
            return view('pokemon.search')->withErrors(['name' => 'Pokémon not found.']);
        }
    }

}

