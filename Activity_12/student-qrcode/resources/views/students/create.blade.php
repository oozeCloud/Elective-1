@extends('layouts.app')

@section('content')
<h2>Add Student</h2>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    @include('students.form')
    <button>Save</button>
</form>
@endsection
