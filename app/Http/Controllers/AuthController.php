<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the user already exists
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'User with this email already exists.');
        }

        // Create a new user and hash the password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Registration successful!');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Create a login view
    }

    // Handle user login
    public function login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    // Show the home page after login
    public function showHome()
    {
        return view('auth.home'); // Create a home view for logged-in users
    }
}
