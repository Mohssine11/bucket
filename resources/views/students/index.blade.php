<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('create') }}">Add Student</a>
    <h1>Students List</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudients as $etudient)
            <tr>
                <td><img src="{{ $etudient->image }}" alt="Student Image" width="50"></td>
                <td>{{ $etudient->id }}</td>
                <td>{{ $etudient->name }}</td>
                <td>{{ $etudient->email }}</td>
                <td>
                    <a href="{{ route('edit', $etudient->id) }}">Edit</a>
                    <form action="{{ route('delete', $etudient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('show', $etudient->id) }}">Show</a>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>