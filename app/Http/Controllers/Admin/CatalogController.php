<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display the catalog management page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.catalog.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->file('image') ? $request->file('image')->store('courses', 'public') : null,
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Course created successfully!');
    }

    /**
     * Show the form for editing the specified course.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\View\View
     */
    public function edit(Course $course)
    {
        return view('admin.catalog.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->file('image') ? $request->file('image')->store('courses', 'public') : $course->image,
        ]);

        return redirect()->route('admin.catalog.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified course from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.catalog.index')->with('success', 'Course deleted successfully!');
    }
}
