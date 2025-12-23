<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

  public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    // Send status update email
    \Mail::to($order->customer_email)->send(new \App\Mail\OrderStatusUpdated($order));

    return redirect()->back()->with('success', 'Order status updated!');
}
    public function downloadInvoice($id)
{
    $order = Order::with(['orderItems.product', 'user'])->findOrFail($id);
    $pdf = \PDF::loadView('frontend.invoice', compact('order'));
    return $pdf->download('invoice-'.$order->order_number.'.pdf');
}
}