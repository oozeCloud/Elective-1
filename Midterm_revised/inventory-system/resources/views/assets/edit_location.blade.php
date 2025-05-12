@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Location</h1>
    <form method="POST" action="/locations/{{ $location->id }}/update" class="mb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Warehouse Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $location->name }}" placeholder="Enter warehouse name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $location->address }}" placeholder="Enter address" required>
        </div>
        <div class="mb-3">
            <label for="in_charge" class="form-label">In Charge</label>
            <input type="text" class="form-control" id="in_charge" name="in_charge" value="{{ $location->in_charge }}" placeholder="Enter person in charge" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Location</button>
        <a href="/locations" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection