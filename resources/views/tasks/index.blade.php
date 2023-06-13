<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>post index</h1>

    <a href="{{ route('tasks.create') }}">Create Tasks</a><br /><br />
    @foreach ($tasks as $task)
        <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
    @endforeach
</body>
</html>