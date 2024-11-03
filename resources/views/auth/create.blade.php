<!-- resources/views/auth/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light grey background */
            color: #333; /* Dark grey text for readability */
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #2c3e50; /* Darker shade for the heading */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff; /* White background for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #3498db; /* Blue border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button {
            background-color: black; /* Black background for the button */
            color: white; /* White text */
            border: none;
            cursor: pointer;
            font-weight: bold;
            width: 200px;
            margin-left: 12rem;
        }

        button:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }

        .success-message {
            color: green; /* Green color for success message */
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-view-all {
            display: inline-block;
            background-color: black; /* Black background for the button */
            color: white; /* White text */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none; /* Remove underline */
            font-weight: bold;
            text-align: center;
            width: 150px; /* Fixed width */
            margin-left: -1.5rem; /* Margin from the left */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .btn-view-all:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a New Course</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Course Title:</label>
            <input type="text" name="title" id="title" required>
            
            <label for="instructor">Instructor Name:</label>
            <input type="text" name="instructor" id="instructor" required>
            
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required>
            
            <label for="image">Course Image:</label>
            <input type="file" name="image" id="image" required>
            
            <button type="submit">Add Course</button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('courses.index') }}" class="btn-view-all">View All Courses</a>
        </div>
    </div>
</body>
</html>
