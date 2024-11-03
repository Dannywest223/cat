<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .button {
            background-color: #007BFF; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 10px; /* Add margin for spacing */
        }
        .button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <h1>Welcome to the Home Page</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>You are logged in!</p>
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ url('/logout') }}">Logout</a>

    <br><br>

    <!-- Button to the product page -->
    <a href="{{ route('add.product') }}" class="button">Add New Product</a>

    <!-- Button to the course page -->
    <a href="{{ route('courses.create') }}" class="button">Add New Course</a> <!-- Updated Button for Courses -->

</body>
</html>
