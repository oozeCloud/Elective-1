@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Assets in {{ $location->name }}</h1>
        <div>
            <a href="/asset/{{ $location->id }}/create" class="btn btn-success me-2">Add New Asset</a>
            <a href="/locations" class="btn btn-info">Back to Locations</a>
        </div>
    </div><br>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Asset List</h5>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr onclick="window.location.href='/asset/{{ $asset->id }}/view';" style="cursor: pointer;">
                <td>{{ $asset->name }}</td>
                <td>{{ $asset->status }}</td>
                <td>
                    <a href="/asset/{{ $asset->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/asset/{{ $asset->id }}/{{ $location->id }}/delete" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection