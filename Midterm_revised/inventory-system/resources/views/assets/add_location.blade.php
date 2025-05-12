@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Location</h1>
    <a href="/locations" class="btn btn-secondary mb-3">Back to Locations</a>

    <form action="/locations" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Warehouse Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter warehouse name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
        </div>
        <div class="mb-3">
            <label for="in_charge" class="form-label">In Charge</label>
            <input type="text" class="form-control" id="in_charge" name="in_charge" placeholder="Enter person in charge" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Location</button>
    </form>
</div>
@endsection