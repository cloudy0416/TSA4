
@extends('layouts.app')

@section('title', 'About | Tasks Today')

@section('content')

<div class="card">

    <h1>About Tasks Today</h1>

    <p>
        Tasks Today is a web-based task management system
        developed using the Laravel framework.
    </p>

    <p>
        It allows users to organize their daily activities,
        create tasks, update task information, monitor progress,
        and archive completed or unnecessary tasks.
    </p>

    <h3>System Features</h3>

    <ul>
        <li>User registration and authentication</li>
        <li>Task creation and management</li>
        <li>Task status monitoring</li>
        <li>Task archiving</li>
        <li>Email notifications when tasks are completed</li>
    </ul>

    <h3>Technology Used</h3>

    <ul>
        <li>Laravel 12</li>
        <li>PHP</li>
        <li>MySQL</li>
        <li>HTML and CSS</li>
        <li>Laravel Breeze</li>
    </ul>

</div>

@endsection
