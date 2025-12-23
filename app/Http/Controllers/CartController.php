<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        $product = Product::findOrFail($id);
        $size = $request->input('size');

        // Check if product has sizes
        if($product->sizes->count() > 0 && !$size) {
            return redirect()->back()->with('error', 'Please select a size');
        }

        // Check stock for specific size
        if($size) {
            $productSize = $product->sizes()->where('size', $size)->first();
            if(!$productSize || $productSize->stock == 0) {
                return redirect()->back()->with('error', 'Selected size is out of stock');
            }
        }

        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $id)
                        ->where('size', $size)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'size' => $size,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cartItems = Cart::with('product.sizes')->where('user_id', auth()->id())->get();
        
        // Calculate prices with size adjustments
        foreach($cartItems as $item) {
            if($item->size) {
                $sizeVariant = $item->product->sizes()->where('size', $item->size)->first();
                if($sizeVariant) {
                    $item->size_price_adjustment = $sizeVariant->price_adjustment;
                }
            }
        }
        
        return view('frontend.cart', compact('cartItems'));
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->first();
        
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }
        
        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function removeFromCart($id)
    {
        Cart::where('user_id', auth()->id())->where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}