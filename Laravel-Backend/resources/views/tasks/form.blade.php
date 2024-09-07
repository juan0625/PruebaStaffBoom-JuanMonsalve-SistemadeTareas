<!DOCTYPE html>
<html>
<head>
    <title>Task Form</title>
</head>
<body>
    <form method="POST" action="{{ isset($task) ? '/tasks/' . $task->id : '/tasks' }}">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif
        <label>Title:</label>
        <input type="text" name="title" value="{{ $task->title ?? '' }}" required>
        <br>
        <label>Description:</label>
        <textarea name="description">{{ $task->description ?? '' }}</textarea>
        <br>
        <label>Due Date:</label>
        <input type="date" name="due_date" value="{{ $task->due_date ?? '' }}" required>
        <br>
        <button type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
    </form>
</body>
</html>
