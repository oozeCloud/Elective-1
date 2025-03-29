@extends('layouts.app')

@section('content')
<div class="container">
    @if($asset != null)
        <h1>Asset Details</h1>
        <p><strong>Name:</strong> {{ $asset->name }}</p>
        <p><strong>Description:</strong> {{ $asset->description }}</p>
        <p><strong>Location:</strong> {{ $asset->location }}</p>
        <p><strong>Status:</strong> {{ $asset->status }}</p>

        <a href="/asset"><button>Back</button></a>
    @else
        <h1>Asset Not Found!</h1>
        <a href="/asset"><button>Back</button></a>
    @endif

    <h2>Maintenance History</h2>
    <ul>
        <table>
            <thead>
            <tr>
                <th>Status</th>
                <th>Note</th>
                <th>When</th>
            </tr>
            </thead>
            <tbody>
            @foreach($history as $record)
            <tr>
                <td>{{ $record->status_change }}</td>
                <td>{{ $record->note }}</td>
                <td>{{ $record->created_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </ul>
</div>
@endsection
