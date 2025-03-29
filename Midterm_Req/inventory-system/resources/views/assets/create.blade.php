@extends('layouts.app')

@section('content')
<h1>Add New Asset</h1>
<form method="POST" action="/asset/store">
    @csrf
    <label for="name">Name: </label><input type="text" name="name" placeholder="Name" required><br>
    <textarea name="description" placeholder="Add description (optional)"></textarea><br><br>
    <label for="location">Location: </label><select name="location" required>
        <option value="warehouse 1">warehouse 1</option>
        <option value="warehouse 2">warehouse 2</option>
        <option value="warehouse 3">warehouse 3</option>
        <option value="warehouse 4">warehouse 4</option>
        <option value="warehouse 5">warehouse 5</option>
        <option value="warehouse 6">warehouse 6</option>
        <option value="warehouse 7">warehouse 7</option>
    </select><br><br>
    <label for="status">Status: </label><select name="status">
        <option value="in use">In Use</option>
        <option value="under maintenance">Under Maintenance</option>
    </select><br>
    <textarea name="note" id="note" placeholder="Add status note (optional)"></textarea><br><br>
    <button type="submit">Add Asset</button>
</form>
<a href="/asset"><button>Back</button></a>
@endsection



