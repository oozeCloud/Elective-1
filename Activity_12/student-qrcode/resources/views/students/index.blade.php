@extends('layouts.app')

@section('content')
<div>
    <form method="GET" action="{{ route('students.index') }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search">
        <button>Search</button>
    </form>
    <a href="{{ route('students.create') }}">Add Student</a>
</div>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>QR Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->course }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}">View QR</a>
            </td>
            <td>
                <a href="{{ route('students.edit', $student) }}">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{ $students->links() }}
</div>
@endsection
