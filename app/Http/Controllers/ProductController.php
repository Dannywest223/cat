<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Show the product creation form
    public function create()
    {
        return view('auth.product'); // Points to the form for adding a product
    }

    // Store product details in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload and store it in the public storage
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Create a new product using mass assignment
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        // Redirect back to the product creation form with a success message
        return redirect()->route('products.create')->with('success', 'Product saved successfully!');
    }

    // Show a list of products with their details
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Return the product list view with the products data
        return view('auth.product_list', compact('products')); // View to display all products
    }

    // Show the edit form for a specific product
    public function edit($id)
    {
        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);
        
        // Return the edit view with the product data
        return view('auth.edit_product', compact('product'));
    }

    // Update the product details in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);

        // If a new image is uploaded, handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        // Update the product details
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete a product from the database
    public function destroy($id)
    {
        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);

        // Delete the product's image from storage if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete the product from the database
        $product->delete();

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
