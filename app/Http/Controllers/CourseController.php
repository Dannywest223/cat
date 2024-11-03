<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display the form for creating a new course
    public function create()
    {
        return view('auth.create'); // Adjust the path if necessary
    }

    // Store a newly created course in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Store the uploaded image and get the path
        $imagePath = $request->file('image')->store('course_images', 'public');
        
        // Create a new course record
        Course::create([
            'title' => $request->input('title'),
            'instructor' => $request->input('instructor'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);
        
        // Redirect back to the create page with a success message
        return redirect()->route('courses.create')->with('success', 'Course added successfully!');
    }
    
    // Display a list of all courses
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all(); // Adjust if you want pagination or specific ordering
        return view('auth.index', compact('courses')); // Make sure you create this view
    }

    // Display the form for editing a course
    public function edit($id)
    {
        $course = Course::findOrFail($id); // Fetch the course to edit
        return view('auth.edit', compact('course')); // Make sure this view exists
    }

    // Update the specified course in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the course by ID
        $course = Course::findOrFail($id);

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded image and get the path
            $imagePath = $request->file('image')->store('course_images', 'public');
            $course->image = $imagePath; // Update the image path in the course
        }

        // Update course details
        $course->title = $request->input('title');
        $course->instructor = $request->input('instructor');
        $course->price = $request->input('price');
        $course->save(); // Save the changes

        // Redirect back to the index with a success message
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete a specific course
    public function destroy($id)
    {
        $course = Course::findOrFail($id); // Find the course by ID
        $course->delete(); // Delete the course

        // Redirect back to the index with a success message
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
