<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display the catalog page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $catalogs = Course::all();
        return view('catalog.index', compact('catalogs'));
    }

    /**
     * Display the course details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(Course $course)
    {
        return view('catalog.show', compact('course'));
    }

    public function postOrder(Request $request, Course $course)
    {
        $request->validate([
            'email' => 'required|email',
            'schedule' => 'required|date',
        ]);

        $order = $course->orders()->create([
            'email' => $request->email,
            'schedule' => $request->schedule,
            'status' => 'pending',
        ]);

        return redirect()->route('catalog.show', $course)->with('success', 'Order placed successfully!');
    }
}
