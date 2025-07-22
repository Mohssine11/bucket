<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
</head>
<body>
    <h1>Students List</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('create') }}">Add Student</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                @if($student->image)
                    <img src="{{ $student->image }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('show', $student->id) }}">View</a>
                <a href="{{ route('edit', $student->id) }}">Edit</a>
                <form action="{{ route('delete', $student->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>