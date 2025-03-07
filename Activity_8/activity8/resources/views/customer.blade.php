@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <h2>Customer Details</h2>
    <p><strong>ID:</strong> {{ $id }}</p>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Address:</strong> {{ $address }}</p>
@endsection
