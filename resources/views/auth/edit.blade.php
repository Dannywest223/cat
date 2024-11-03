<!-- resources/views/auth/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Base styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 1em;
        }

        input[type="file"] {
            padding: 5px;
        }

        .current-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        img {
            max-width: 100px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 1em;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Alert styling */
        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }

            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Course</h1>

        <!-- Display Success Message if Available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Errors if Any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Course Form -->
        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $course->title) }}" required>
            </div>

            <div class="form-group">
                <label for="instructor">Instructor</label>
                <input type="text" name="instructor" value="{{ old('instructor', $course->instructor) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{ old('price', $course->price) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="image">Course Image</label>
                <input type="file" name="image">
                @if ($course->image)
                    <div class="current-image">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn">Update Course</button>
        </form>
    </div>
</body>
</html>
