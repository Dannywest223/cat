<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 300px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745; /* Green background */
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px; /* Added space between buttons */
        }
        button:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .success-message {
            color: #28a745;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column; /* Changed to column to stack buttons */
            gap: 10px; /* Added space between buttons */
        }
        .details-button {
            background-color: #28a745; /* Green background for details button */
            padding: 10px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            text-align: center;
            display: inline-block;
        }
        .details-button:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>

    <div class="container">
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Add Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>

            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <div class="button-container">
                <button type="submit">Save Product</button>
                <a href="{{ route('products.index') }}" class="details-button">Product Details</a>
            </div>
        </form>
    </div>

</body>
</html>
