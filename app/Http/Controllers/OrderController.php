<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
public function checkout()
{
    $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
    
    if($cartItems->count() == 0) {
        return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
    }

    $subtotal = 0;
    foreach($cartItems as $item) {
        $price = $item->product->discount_price ?? $item->product->price;
        
        // Add size price adjustment
        if($item->size) {
            $sizeVariant = $item->product->sizes()->where('size', $item->size)->first();
            if($sizeVariant) {
                $price += $sizeVariant->price_adjustment;
            }
        }
        
        $subtotal += $price * $item->quantity;
    }
    
    $shippingCharge = \App\Models\Setting::get('shipping_charge', 0);
    $total = $subtotal + $shippingCharge;

    return view('frontend.checkout', compact('cartItems', 'subtotal', 'shippingCharge', 'total'));
}
    public function placeOrder(Request $request)
{
 $request->validate([
    'customer_name' => 'required',
    'customer_email' => 'required|email',
    'customer_phone' => 'required',
    'shipping_address' => 'required',
    'payment_method' => 'required',
    'transaction_id' => 'required_unless:payment_method,cod',
]);

// Auto-generate transaction ID for COD
if($request->payment_method === 'cod' && empty($request->transaction_id)) {
    $request->merge(['transaction_id' => 'COD-' . time()]);
}

    $cartItems = Cart::with('product.sizes')->where('user_id', auth()->id())->get();
    
    $subtotal = 0;
    foreach($cartItems as $item) {
        $price = $item->product->discount_price ?? $item->product->price;
        
        // Add size price adjustment
        if($item->size) {
            $sizeVariant = $item->product->sizes()->where('size', $item->size)->first();
            if($sizeVariant) {
                $price += $sizeVariant->price_adjustment;
            }
        }
        
        $subtotal += $price * $item->quantity;
    }
    
    $shippingCharge = \App\Models\Setting::get('shipping_charge', 0);
    $total = $subtotal + $shippingCharge;

    $order = Order::create([
        'user_id' => auth()->id(),
        'order_number' => 'ORD-' . time(),
        'total_amount' => $total,
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'shipping_address' => $request->shipping_address,
        'payment_method' => $request->payment_method,
        'transaction_id' => $request->transaction_id,
        'note' => $request->note,
        'status' => 'pending',
    ]);

    foreach($cartItems as $item) {
        $price = $item->product->discount_price ?? $item->product->price;
        
        // Add size price adjustment
        if($item->size) {
            $sizeVariant = $item->product->sizes()->where('size', $item->size)->first();
            if($sizeVariant) {
                $price += $sizeVariant->price_adjustment;
            }
        }
        
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'size' => $item->size,
            'quantity' => $item->quantity,
            'price' => $price,
        ]);
        
        // Reduce stock for specific size
        if($item->size) {
            $sizeVariant = $item->product->sizes()->where('size', $item->size)->first();
            if($sizeVariant) {
                $sizeVariant->decrement('stock', $item->quantity);
            }
        } else {
            // If no size, reduce main product stock
            $item->product->decrement('stock', $item->quantity);
        }
    }

    Cart::where('user_id', auth()->id())->delete();
    Cart::where('user_id', auth()->id())->delete();

// Send order confirmation email
\Mail::to($order->customer_email)->send(new \App\Mail\OrderConfirmation($order));

return redirect()->route('order.success', $order->id);

   
}

    public function success($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        return view('frontend.order-success', compact('order'));
    }

    public function myOrders()
    {
        $orders = Order::with('orderItems.product')->where('user_id', auth()->id())->latest()->get();
        return view('frontend.my-orders', compact('orders'));
    }

    public function downloadInvoice($id)
    {
        $order = Order::with(['orderItems.product', 'user'])->findOrFail($id);
        
        // Check if order belongs to logged in user
        if($order->user_id != auth()->id()) {
            abort(403);
        }
        
        $pdf = \PDF::loadView('frontend.invoice', compact('order'));
        return $pdf->download('invoice-'.$order->order_number.'.pdf');
    }
}