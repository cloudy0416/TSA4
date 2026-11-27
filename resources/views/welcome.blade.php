@extends('layouts.app')

@section('title', 'Welcome | Tasks Today')

@section('content')

<div class="card" style="text-align:center; padding:65px 25px;">

    <h1 style="font-size:42px;">
        Welcome to Tasks Today
    </h1>

    <p style="font-size:18px; color:#64748b;">
        Organize your tasks. Manage your time. Stay productive.
    </p>

    <br>

    <a href="{{ route('tasks.index') }}" class="btn">
        View Tasks
    </a>

    @guest
        <a href="{{ route('register') }}" class="btn">
            Get Started
        </a>
    @else
        <a href="{{ route('tasks.create') }}" class="btn">
            Add New Task
        </a>
    @endguest

</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px;">

    <div class="card">
        <h3>Organize Tasks</h3>
        <p>Create and manage your daily activities.</p>
    </div>

    <div class="card">
        <h3>Track Progress</h3>
        <p>Monitor your tasks from Pending to Done.</p>
    </div>

    <div class="card">
        <h3>Stay Productive</h3>
        <p>Keep your responsibilities organized.</p>
    </div>

</div>

@endsection
