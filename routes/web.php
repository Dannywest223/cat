<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourseController;


// Home route (after successful login)
Route::get('/', [AuthController::class, 'showHome'])->name('home');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Product creation routes
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route to the product creation form view
Route::get('/product', function () {
    return view('auth.product'); // View file located at resources/views/auth/product.blade.php
})->name('product.page');

// Route to the product list page (viewing all products)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Optional redirect route for add product
Route::get('/add-product', function () {
    return redirect()->route('product.page');
})->name('add.product');

Route::get('/products/details', [ProductController::class, 'index'])->name('products.details');

Route::resource('products', ProductController::class);

Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('courses/store', [CourseController::class, 'store'])->name('courses.store');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::resource('courses', CourseController::class);