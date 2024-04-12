<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            @else
                <a href="/login">Login</a>
            @endauth
        </div>
    </nav>
    <div class="container">
        @yield('body')
    </div>
</body>
</html>