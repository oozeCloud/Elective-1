@extends('layouts.app')

@section('content')
<h1>Edit Asset</h1>
<form method="POST" action="/asset/{{ $asset->id }}/update">
    @csrf
    <label for="name">Name: </label><input type="text" name="name" value="{{ $asset->name }}" placeholder="Name" required>
    <textarea name="description" placeholder="Description">{{ $asset->description }}</textarea><br><br>
    <label for="location">Location: </label><select name="location">
        <option value="warehouse 1" {{ $asset->location == 'warehouse 1' ? 'selected' : '' }}>warehouse 1</option>
        <option value="warehouse 2" {{ $asset->location == 'warehouse 2' ? 'selected' : '' }}>warehouse 2</option>
        <option value="warehouse 3" {{ $asset->location == 'warehouse 3' ? 'selected' : '' }}>warehouse 3</option>
        <option value="warehouse 4" {{ $asset->location == 'warehouse 4' ? 'selected' : '' }}>warehouse 4</option>
        <option value="warehouse 5" {{ $asset->location == 'warehouse 5' ? 'selected' : '' }}>warehouse 5</option>
        <option value="warehouse 6" {{ $asset->location == 'warehouse 6' ? 'selected' : '' }}>warehouse 6</option>
        <option value="warehouse 7" {{ $asset->location == 'warehouse 7' ? 'selected' : '' }}>warehouse 7</option>
    </select><br><br>
    <label for="status">Status: </label><select name="status">
        <option value="in use" {{ $asset->status == 'in use' ? 'selected' : '' }}>In use</option>
        <option value="under maintenance" {{ $asset->status == 'under maintenance' ? 'selected' : '' }}>Under Maintenance</option>
    </select><br>
    <textarea name="note" id="note" placeholder="Add status note (optional)"></textarea><br><br>
    <button type="submit">Update Asset</button>
</form>
<a href="/asset"><button>Back</button></a>
@endsection
