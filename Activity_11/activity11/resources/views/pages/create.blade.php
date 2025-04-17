@extends('layouts.app')

@section('title')
<title>save a book</title>
@endsection

@section('content')
<form action="{{ route('bookss.store') }}" method="POST"><br>
    @csrf
    <input type="text" name="title" placeholder="Title"><br>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="text" name="author" placeholder="Author"><br>
    <label for="">date published: </label><input type="date" name="published_date">
    <button type="submit">submit</button>
</form>
<a href="{{ route('bookss.index') }}"><button>Back</button></a>
@endsection
