<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>edit</h1><br />

    <form action="{{ route('tasks.update', $task->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @error('title')
            {{ $message }}
        @enderror
        <input type="text" name="title" value="{{ $task->title }}">

        @error('photo')
            {{ $message }}
        @enderror
        <input type="file" name="photo" id="">

        <input type="submit" value="Edit">
    </form>
    <img width="100" height="100" src="{{ asset('uploads/'.$task->link) }}" alt="">
</body>
</html>