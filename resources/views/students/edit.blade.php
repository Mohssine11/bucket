<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('update', $student->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $student->name }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $student->email }}" required>
        
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        
        <button type="submit">Update</button>

    </form>

</body>
</html>