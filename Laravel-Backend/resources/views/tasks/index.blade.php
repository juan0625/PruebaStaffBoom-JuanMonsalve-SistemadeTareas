<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>
    <a href="/tasks/create">Create Task</a>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }} - <a href="/tasks/{{ $task->id }}">View</a></li>
        @endforeach
    </ul>
</body>
</html>
