@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Asset</h1>
    <form method="POST" action="/asset/{{ $asset->id }}/update" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $asset->name }}" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $asset->description ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="in use" {{ $asset->status == 'in use' ? 'selected' : '' }}>In Use</option>
                <option value="under maintenance" {{ $asset->status == 'under maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Status Note</label>
            <textarea class="form-control" id="note" name="note" placeholder="Add status note (optional)">{{ $maintenance->note ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Asset</button>
        <a href="/locations/{{ $asset->location }}/view" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
