@extends('layouts.app')

@section('content')
<h2>Student QR Code</h2>

<div>
    <p><strong>ID:</strong> {{ $student->student_id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>Year Level:</strong> {{ $student->year_level }}</p>

    <div>
        {!! $qrCode !!}
    </div>

    <a href="{{ route('students.index') }}">Back to List</a>
</div>
@endsection
