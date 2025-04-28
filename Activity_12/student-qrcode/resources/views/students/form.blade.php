<div>
    <label>Student ID</label>
    <input type="text" name="student_id" value="{{ old('student_id', $student->student_id ?? '') }}">
</div>
<div>
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}">
</div>
<div>
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}">
</div>
<div>
    <label>Course</label>
    <input type="text" name="course" value="{{ old('course', $student->course ?? '') }}">
</div>
<div>
    <label>Year Level</label>
    <input type="text" name="year_level" value="{{ old('year_level', $student->year_level ?? '') }}">
</div>
