@extends('layouts.app')

@section('title', 'Add Task | Tasks Today')

@section('content')

<div class="card">

    <h1>Add New Task</h1>
    <p>Fill in the information below to create a task.</p>

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label>Task Title</label>
        <input type="text"
               name="title"
               value="{{ old('title') }}"
               maxlength="150"
               placeholder="Enter task title"
               required>

        <label>Description</label>
        <textarea name="description"
                  rows="5"
                  placeholder="Enter task description">{{ old('description') }}</textarea>

        <label>Due Date</label>
        <input type="date"
               name="due_date"
               value="{{ old('due_date') }}">

        <label>Status</label>
        <select name="status" required>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="done">Done</option>
        </select>

        <button type="submit" class="btn">
            Save Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
