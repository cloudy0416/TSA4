<!DOCTYPE html>
<html>
<head>
    <title>Task Completed</title>
</head>
<body>
    <h2>Task Completed!</h2>

    <p>A task has been marked as completed.</p>

    <p><strong>Task:</strong> {{ $task->title }}</p>

    <p><strong>Description:</strong>
        {{ $task->description ?? 'No description' }}
    </p>

    <p><strong>Due Date:</strong>
        {{ $task->due_date?->format('F d, Y') ?? 'No due date' }}
    </p>

    <p>Thank you!</p>
    <p>Tasks Today System</p>
</body>
</html>
