<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the catalog page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $catalogs = Course::limit(30)->get();
        return view('index', compact('catalogs'));
    }

    /**
     * Show form to check orders by email.
     *
     * @return \Illuminate\View\View
     */
    public function showOrderForm(Request $request)
    {
        $data = [
            'email' => $request->input('email', ''),
        ];

        $orders = Order::with('course')
            ->where('email', $data['email'])
            ->orderBy('schedule', 'desc')
            ->get();

        return view('check-orders', compact('orders', 'data'));
    }
}
