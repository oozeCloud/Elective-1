@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    @include('students.form')
    <button>Update</button>
</form>
@endsection
