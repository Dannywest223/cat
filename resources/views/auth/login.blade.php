<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="button-group">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                <button type="submit">Login</button>
            </div>


        </form>
        
    </div>
</body>
</html>
