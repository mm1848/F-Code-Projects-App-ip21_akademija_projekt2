<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="/">Home</a>
            <span class="nav-separator">|</span>
            <a href="/about">About</a>
            <span class="nav-separator">|</span>
            <a href="/list">List of Currencies</a>
        </div>

    <div class="login-link">
            @auth
                Logged in as {{ auth()->user()->email }} 
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="/login">Login</a>
                <span class="nav-separator">|</span>
                <a href="/register">Register</a>
            @endauth
        </div>
    </nav>
    <div class="container">
        @yield('body')
    </div>
</body>
</html>