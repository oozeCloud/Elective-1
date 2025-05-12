@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Account</h1>
    <form method="POST" action="{{ route('account.update') }}" class="mb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter a new password (optional)">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
        </div>
        <button type="submit" class="btn btn-primary">Update Account</button>
        <a href="/locations" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection