@extends('layouts.app')

@section('title', 'Edit Task | Tasks Today')

@section('content')

<div class="card">

    <h1>Edit Task</h1>
    <p>Update your task information.</p>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $task->title) }}"
               maxlength="150"
               required>

        <label>Description</label>
        <textarea name="description" rows="5">{{ old('description', $task->description) }}</textarea>

        <label>Due Date</label>
        <input type="date"
               name="due_date"
               value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">

        <label>Status</label>
        <select name="status" required>
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                In Progress
            </option>

            <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>
                Done
            </option>
        </select>

        <button type="submit" class="btn">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
