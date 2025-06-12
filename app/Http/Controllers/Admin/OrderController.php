<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with('course')->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the specified order's status and meet link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,completed,cancelled',
            'meet_link' => 'nullable|url',
        ]);

        $order->status = $request->status;
        $order->meet_link = $request->meet_link;
        $order->save();

        return redirect()->route('admin.orders.show', $order)->with('success', 'Order updated successfully!');
    }

    /**
     * Generate PDF report of completed orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $orders = Order::where('status', 'completed')->with('course')->get();
        $pdf = Pdf::loadView('admin.orders.report', compact('orders'));   
        return $pdf->download('completed_orders_report.pdf');
    }
}
