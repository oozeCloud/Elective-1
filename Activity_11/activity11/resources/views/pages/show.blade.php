@extends('layouts.app')

@section('title')
<title>view details</title>
@endsection

@section('content')
<h3>{{ $book->title }}</h3><br>
<p>{{ $book->description }}</p><br>
<h6>{{ $book->author }}</h6><br>
<p>{{ $book->published_date }}</p><br>
<a href="{{ route('bookss.index') }}"><button>Back</button></a>
@endsection
