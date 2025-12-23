<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $products = Product::where('is_active', true)->latest()->take(8)->get();
        return view('frontend.home', compact('categories', 'products'));
    }


    public function show($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('frontend.product-details', compact('product'));
}

public function search(Request $request)
{
    $query = $request->input('search');
    
    $products = Product::where('is_active', true)
        ->where(function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })
        ->with('category')
        ->get();
    
    $categories = Category::where('is_active', true)->get();
    
    return view('frontend.search-results', compact('products', 'query', 'categories'));
}

public function categoryProducts($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();
    $products = Product::where('category_id', $category->id)
                       ->where('is_active', true)
                       ->latest()
                       ->get();
    $categories = Category::where('is_active', true)->get();
    
    return view('frontend.category-products', compact('category', 'products', 'categories'));
}

public function allProducts()
{
    $products = Product::where('is_active', true)->latest()->paginate(12);
    $categories = Category::where('is_active', true)->get();
    
    return view('frontend.all-products', compact('products', 'categories'));
}

public function about()
{
    return view('frontend.about');
}

public function contact()
{
    return view('frontend.contact');
}

public function contactSubmit(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    // You can save to database or send email here
    // For now, just redirect with success message
    
    return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
}
}