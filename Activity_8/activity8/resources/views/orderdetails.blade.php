@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <h2>Order Details</h2>
    <p><strong>Transaction No:</strong> {{ $transNo }}</p>
    <p><strong>Order No:</strong> {{ $orderNo }}</p>
    <p><strong>Item ID:</strong> {{ $itemId }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Price:</strong> {{ $price }}</p>
    <p><strong>Quantity:</strong> {{ $qty }}</p>
@endsection
