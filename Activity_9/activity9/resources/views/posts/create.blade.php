@extends('layouts.app')

@section('title', 'Create Post')

@section('page-title', 'Create New Post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
