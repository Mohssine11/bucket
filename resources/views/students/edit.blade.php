<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $student->name) }}"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}"><br><br>

        <label>Image:</label><br>
        @if($student->image)
            <img src="{{ $student->image }}" width="100"><br>
        @endif
        <input type="file" name="image"><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>