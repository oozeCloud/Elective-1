@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <h2>Order Details</h2>
    <p><strong>Customer ID:</strong> {{ $customerId }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Order No:</strong> {{ $orderNo }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
@endsection
