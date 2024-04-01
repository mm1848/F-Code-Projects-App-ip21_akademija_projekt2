<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Crypto Prices</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="login-container">
        @if(session('successMessage'))
            <p class="success-message">{{ session('successMessage') }}</p>
        @endif
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>Crypto Prices</h1>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" name="action" value="login" class="login-button">Login</button>
            <!-- Lahko ločite procese registracije in prijave na različne poti -->
            <a href="{{ route('register') }}" class="login-button">Register</a>
        </form>
    </div>
</body>
</html>
