@extends('layouts.app')

@section('content')
<h1>Assets by Location</h1>
<a href="/asset"><button>Back</button></a>
@foreach($locations as $location)
<h2>{{ $location->name }}</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Added at</th>
        </tr>
    </thead>
    <tbody>
        @php
        $assets = DB::table('assets')->where('location', $location->name)->get();
        @endphp
        @foreach($assets as $asset)
        <tr onclick="window.location.href='/asset/{{ $asset->id }}/view';">
            <td>{{ $asset->name }}</td>
            <td>{{ $asset->status }}</td>
            <td>{{ $asset->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table><br><br><br><br><br>
@endforeach
@endsection
