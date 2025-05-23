<!DOCTYPE html>
<html>
<head>
    <title>Pokémon Search</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .card { border: 1px solid #ccc; border-radius: 10px; padding: 20px; max-width: 400px; }
        .error { color: red; }
    </style>
</head>
<body>

    <h1>Search for a Pokémon</h1>

    <form action="{{ route('pokemon.search') }}" method="POST">
        @csrf
        <label for="name">Pokémon Name:</label><br>
        <input type="text" name="name" id="name" required value="{{ old('name') }}">
        <button type="submit">Search</button>
    </form>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first('name') }}
        </div>
    @endif

    @isset($pokemon)
        <div class="card" style="margin-top: 20px;">
            <h2>{{ ucfirst($pokemon['name']) }}</h2>
            <img src="{{ $pokemon['sprites']['front_default'] }}" alt="{{ $pokemon['name'] }}">
            <p><strong>Height:</strong> {{ $pokemon['height'] }}</p>
            <p><strong>Weight:</strong> {{ $pokemon['weight'] }}</p>
            <p><strong>Type(s):</strong>
                @foreach ($pokemon['types'] as $type)
                    {{ $type['type']['name'] }}@if (!$loop->last), @endif
                @endforeach
            </p>
        </div>
    @endisset

</body>
</html>
