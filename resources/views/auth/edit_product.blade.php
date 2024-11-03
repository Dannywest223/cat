<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Georgia', serif; /* Classic font */
            background-color: #f4f4f4; /* Light gray background */
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff; /* Classic blue */
            padding-bottom: 10px;
        }

        form {
            background-color: #fff; /* White background for form */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
            max-width: 600px; /* Limit width for classic look */
            margin: 0 auto; /* Center form */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555; /* Dark gray for labels */
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px;
            font-size: 1em;
        }

        input[type="file"] {
            padding: 5px; /* Adjust padding for file input */
        }

        .current-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .current-image img {
            max-width: 200px;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff; /* Classic blue button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width button */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2em; /* Adjust header size for smaller screens */
            }

            form {
                padding: 15px; /* Adjust padding for smaller screens */
            }
        }
    </style>
</head>
<body>

    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $product->description }}" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>

        <!-- Image Section -->
        <div class="current-image">
            <label>Current Image:</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <div class="no-image">No Image</div>
            @endif
        </div>

        <label for="image">Upload New Image (optional):</label>
        <input type="file" id="image" name="image" accept="image/*">

        <button type="submit">Save Changes</button>
    </form>

</body>
</html>
