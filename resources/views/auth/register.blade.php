<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Include your CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        /* Inline CSS for alert styling, or you can add this in styles.css */
        .alert {
            padding: 15px; /* Padding inside the alert */
            margin-bottom: 20px; /* Space below the alert */
            border-radius: 5px; /* Rounded corners */
            font-family: Arial, sans-serif; /* Font family */
            text-align: center; /* Centered text */
        }

        /* Success message style */
        .alert-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border: 1px solid #c3e6cb; /* Border color */
        }

        /* Error message style */
        .alert-danger {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            border: 1px solid #f5c6cb; /* Border color */
        }

        .button-group {
            margin-top: 20px; /* Space above the button group */
        }

        .register-button, .login-button {
            padding: 10px 15px; /* Button padding */
            text-decoration: none; /* Remove underline */
            margin-right: 10px; /* Space between buttons */
            color: white; /* Button text color */
            background-color: #007bff; /* Button background color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
        }

        .login-button {
            background-color: #28a745; /* Different color for the login button */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf <!-- CSRF protection -->
            
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <!-- Submit button to register -->
            <button type="submit" class="register-button">Register</button>
        </form>

        <div class="button-group">
            <a href="{{ route('login') }}" class="login-button">Login</a>
        </div>
    </div>
</body>
</html>
