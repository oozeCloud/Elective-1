@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-white shadow-lg">
        <div class="card-header">
            <h1>Add Student</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                    <label>Student ID</label>
                    <input type="text" id="student_id" name="student_id" required>

                    <label>Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>

                    <label>Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" required>

                    <label>Age</label>
                    <input type="number" id="age" name="age" required>

                    <label>Email</label>
                    <input type="email" id="email" name="email" required>

                    <label>Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number">

                    <label>Address</label>
                    <textarea id="address" name="address"></textarea>

                <button type="submit">Create Student</button>
            </form>
        </div>
    </div>
</div>
@endsection