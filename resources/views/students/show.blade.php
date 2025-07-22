<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
</head>
<body>
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Image:</strong><br>
        @if($student->image)
            <img src="{{ $student->image }}" width="150">
        @else
            No image.
        @endif
    </p>

    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>