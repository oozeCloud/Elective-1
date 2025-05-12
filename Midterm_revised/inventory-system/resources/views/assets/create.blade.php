@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Asset</h1>
    <form method="POST" action="/asset/store" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Add description (optional)"></textarea>
        </div>
        <div class="mb-3">
            <label for="owner" class="form-label">Owner</label>
            <input type="text" class="form-control" id="owner" name="owner" placeholder="Name of the owner" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="in use">In Use</option>
                <option value="under maintenance">Under Maintenance</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Status Note</label>
            <textarea class="form-control" id="note" name="note" placeholder="Add status note (optional)"></textarea>
        </div>
        <input type="hidden" name="location" value="{{ $location->id }}" required>
        <button type="submit" class="btn btn-primary">Add Asset</button>
        <a href="/asset" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection



