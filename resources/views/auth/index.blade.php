<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light background */
            color: #343a40; /* Dark text color for readability */
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Bootstrap primary color */
            margin-bottom: 20px;
        }

        .alert {
            background-color: #d4edda; /* Light green for success */
            color: #155724; /* Darker green text */
            padding: 10px;
            border: 1px solid #c3e6cb; /* Border for the alert */
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Remove space between cells */
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            border-radius: 8px;
            overflow: hidden; /* Ensure border radius is applied */
        }

        thead {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Light grey border */
        }

        tr:hover {
            background-color: #f1f1f1; /* Highlight row on hover */
        }

        img {
            border-radius: 4px; /* Rounded corners for images */
        }

        .btn {
            display: inline-block;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin: 5px; /* Add margin for spacing */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .container {
            max-width: 1200px; /* Limit the width of the content */
            margin: 0 auto; /* Center align the container */
            padding: 20px;
            background-color: white; /* White background for the main content */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Courses</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Instructor</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th> <!-- Added Actions header -->
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->instructor }}</td>
                        <td>${{ number_format($course->price, 2) }}</td>
                        <td><img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" width="100"></td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this course?');">Delete</button>
                            </form>
                        </td> <!-- Added Action buttons -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="{{ route('courses.create') }}" class="btn">Add New Course</a>
        </div>
    </div>
</body>
</html>
