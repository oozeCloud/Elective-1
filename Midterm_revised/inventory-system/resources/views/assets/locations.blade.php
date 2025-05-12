@extends('layouts.app')

@section('content')
<h1 class="my-4">Asset records</h1><br>
<h3 class="my-4">Hello! {{ auth()->user()->name }}</h3>
<a href="/locations/create" class="btn btn-success mb-3">Add Location</a>
<a href="{{ route('account.edit') }}" class="btn btn-success mb-3">My Account</a>

<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form><br>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Warehouse Name</th>
                <th>Address</th>
                <th>In charge</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $index => $location)
            <tr onclick="window.location='/locations/{{ $location->id }}/view'" style="cursor: pointer;">
                <td>{{ $index + 1 }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
                <td>{{ $location->in_charge }}</td>
                <td>
                    <a href="/locations/{{ $location->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/locations/{{ $location->id }}/delete" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
