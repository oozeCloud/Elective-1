@extends('layouts.app')

@section('content')
<h1>Asset List</h1>
<a href="/asset/create" class="btn btn-success"><button>Add New Asset</button></a>
<a href="/locations" class="btn btn-info"><button>View Locations</button></a>

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assets as $asset)
        <tr onclick="window.location.href='/asset/{{ $asset->id }}/view';">
            <td>{{ $asset->name }}</td>
            <td>{{ $asset->location }}</td>
            <td>{{ $asset->status }}</td>
            <td>
                <a href="/asset/{{ $asset->id }}/edit">Edit</a> |
                <a href="/asset/{{ $asset->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br><br><br><br><br>
@endsection
