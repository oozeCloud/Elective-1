@extends('layouts.app')

@section('title')
<title>edit details</title>
@endsection

@section('content')
<form action="{{ route('bookss.update', $book) }}" method="POST"><br>
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $book->title }}"><br>
    <textarea name="description">{{ $book->description }}</textarea>
    <input type="text" name="author" value="{{ $book->author }}"><br>
    <label for="">date published: </label><input type="date" name="published_date" value="{{ $book->published_date }}">
    <button type="submit">submit</button>
</form>
<a href="{{ route('bookss.index') }}"><button>Back</button></a>
@endsection
