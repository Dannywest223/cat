<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            font-size: 2.5em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }
        .add-product-button,
        .edit-button,
        .delete-button {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-right: 5px; /* Add spacing between buttons */
        }
        .add-product-button {
            background-color: #007bff;
        }
        .add-product-button:hover {
            background-color: #0056b3;
        }
        .edit-button {
            background-color: #28a745; /* Green for edit */
        }
        .edit-button:hover {
            background-color: #218838;
        }
        .delete-button {
            background-color: #dc3545; /* Red for delete */
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .no-image {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #666;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }
            .add-product-button {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>

    <h1>Product List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
        <a href="{{ route('products.create') }}" class="add-product-button">Add New Product</a>
    </div>

</body>
</html>
