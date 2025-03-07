@extends('layouts.app')

@section('title', 'Item Details')

@section('content')
    <h2>Item Details</h2>
    <p><strong>Item No:</strong> {{ $itemNo }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Price:</strong> {{ $price }}</p>
@endsection
