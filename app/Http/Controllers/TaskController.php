<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCompletedMail;

class TaskController extends Controller
{
    // Display all non-archived tasks
    public function index()
    {
        $tasks = Task::with('user')
            ->where('is_archived', false)
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $validated['user_id'] = auth()->id();

        $task = Task::create($validated);

        // Notify only if initially created as Done
        if ($task->status === 'done') {
            Mail::to('admin@example.com')
                ->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit(Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);

        return view('tasks.edit', compact('task'));
    }

    // Update existing task
    public function update(Request $request, Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $wasNotDone = $task->status !== 'done';

        $task->update($validated);

        // Send email only when status changes to Done
        if ($wasNotDone && $task->status === 'done') {
            Mail::to('admin@example.com')
                ->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    // Archive task
    public function archive(Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);

        $task->update([
            'is_archived' => true
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task archived successfully!');
    }
}
