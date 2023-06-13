<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>show</h1>

    {{ $task->title }}<br />
    <img width="100" height="100" src="{{ asset('uploads/'.$task->link) }}" alt="">

    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
    </form><br />
    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
</body>
</html>