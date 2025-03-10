@extends('layouts.app')

@section('title', 'Edit Post')

@section('page-title', 'Edit Post')

@section('content')
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
