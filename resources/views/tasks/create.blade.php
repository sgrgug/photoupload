<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>create</h1>
    <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @error('title')
            {{ $message }}
        @enderror
        <input type="text" name="title" placeholder="title" value="{{ old('title') }}">
        @error('photo')
            {{ $message }}
        @enderror
        <input type="file" name="photo">
        <input type="submit" value="upload">
    </form>
</body>
</html>