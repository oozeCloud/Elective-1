@extends('layouts.app')

@section('content')
<div class="container my-4">
    @if($asset != null)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Asset Details</h4>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $asset->name }}</p>
                <p><strong>Description:</strong> {{ $asset->description }}</p>
                <p><strong>Location:</strong> {{ $asset->location }}</p>
                <p><strong>Status:</strong> {{ $asset->status }}</p>
                <p><strong>Owned by:</strong> {{ $asset->owner }}</p>
                <a href="/locations/{{ $asset->location }}/view" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <h4 class="alert-heading">Asset Not Found!</h4>
            <p>The asset you are looking for does not exist.</p>
            <a href="/asset" class="btn btn-secondary">Back</a>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Maintenance History</h4>
        </div>
    </div>
        @if($history->isEmpty())
            <p class="text-muted">No maintenance history available for this asset.</p>
        @else
            <table class="table table-striped">
                <thead class="table-dark">
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
                        <td>{{ $record->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
</div>
@endsection