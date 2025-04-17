@extends('layouts.app')

@section('title')
<title>list of books</title>
@endsection

@section('content')
@if(session('success'))
<div>
    {{session('success')}}
</div>
@endif
<a href="{{ route('bookss.create') }}"><button>Add Book</button></a>
<table border=1>
    <thead>
        <tr>
            <td>title</td>
            <td>author</td>
            <td>published in</td>
            <td>action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->published_date }}</td>
            <td>
                <a href="{{ route('bookss.show', $book->id) }}">view</a>|
                <a href="{{ route('bookss.edit', $book->id) }}">edit</a>|
                <form action="{{ route('bookss.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('are you sure')">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
