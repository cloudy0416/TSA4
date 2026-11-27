@extends('layouts.app')

@section('title', 'Tasks | Tasks Today')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
    <div>
        <h1>My Tasks</h1>
        <p>View and manage your activities.</p>
    </div>

    @auth
        <a href="{{ route('tasks.create') }}" class="btn">
            + Add New Task
        </a>
    @endauth
</div>

<div class="card">

    @forelse($tasks as $task)

        <div class="task">

            <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:10px;">

                <h3>{{ $task->title }}</h3>

                <span class="status">
                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                </span>

            </div>

            <p>{{ $task->description ?? 'No description provided.' }}</p>

            <p>
                <strong>Due Date:</strong>
                {{ $task->due_date?->format('F d, Y') ?? 'No due date' }}
            </p>

            <p>
                <strong>Created by:</strong>
                {{ $task->user?->name ?? 'Unknown User' }}
            </p>

            @auth
                @if($task->user_id === auth()->id())

                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('tasks.archive', $task->id) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Archive this task?')">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-danger">
                            Archive
                        </button>

                    </form>

                @endif
            @endauth

        </div>

    @empty

        <p style="text-align:center; padding:30px;">
            No tasks available yet.
        </p>

    @endforelse

</div>

@endsection
