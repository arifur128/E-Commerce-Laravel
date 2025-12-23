<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function dashboard()
{
    $totalProducts = \App\Models\Product::count();
    $totalCategories = \App\Models\Category::count();
    $totalOrders = \App\Models\Order::count();
    $totalRevenue = \App\Models\Order::where('status', '!=', 'cancelled')->sum('total_amount');
    $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
    $recentOrders = \App\Models\Order::with('user')->latest()->take(5)->get();
    
    return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalOrders', 'totalRevenue', 'pendingOrders', 'recentOrders'));
}
}