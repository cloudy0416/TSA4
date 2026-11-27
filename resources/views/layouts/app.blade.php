
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tasks Today')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef2f7;
            color: #24364b;
        }

        nav {
            background: #102542;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav .brand {
            color: white;
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;
        }

        nav a {
            color: #dce7f5;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            color: white;
        }

        .nav-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(16,37,66,.07);
            margin-bottom: 20px;
        }

        h1, h2, h3 {
            color: #102542;
        }

        .btn {
            display: inline-block;
            background: #102542;
            color: white;
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            background: #244b75;
        }

        .btn-secondary {
            background: #64748b;
        }

        .btn-danger {
            background: #b42332;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            margin-top: 7px;
            margin-bottom: 16px;
        }

        label {
            font-weight: bold;
            color: #102542;
        }

        .task {
            border: 1px solid #e1e8f0;
            border-left: 5px solid #183b63;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .status {
            display: inline-block;
            background: #e8eef6;
            color: #102542;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            color: #b42332;
            font-size: 13px;
        }

        footer {
            background: #102542;
            color: #dce7f5;
            padding: 22px;
            text-align: center;
            margin-top: 50px;
        }

        @media(max-width: 600px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<nav>
    <a class="brand" href="{{ route('welcome') }}">Tasks Today</a>

    <div class="nav-links">
        <a href="{{ route('welcome') }}">Home</a>
        <a href="{{ route('tasks.index') }}">Tasks</a>
        <a href="{{ route('about') }}">About</a>

        @auth
            <a href="{{ route('profile.edit') }}">Profile</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-secondary" type="submit">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>

<main class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="card">
            @foreach($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @yield('content')

</main>

<footer>
    <p>© {{ date('Y') }} Tasks Today Management System</p>
</footer>

</body>
</html>
