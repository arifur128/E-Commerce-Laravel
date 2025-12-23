<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- FIX: Ensure proper mobile viewport scaling [citation:1][citation:6] -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Jersey Shop - Premium Football Jerseys</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .fade-in-up { animation: fadeInUp 0.6s ease-out; }
        .hover-scale { transition: transform 0.3s ease; }
        .hover-scale:hover { transform: scale(1.05); }
        .animate-float { animation: float 3s ease-in-out infinite; }
        
        /* FIX: Mobile-specific styles for better touch interaction [citation:7] */
        @media (max-width: 768px) {
            .mobile-touch-target {
                min-height: 44px; /* Minimum touch target size */
                min-width: 44px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            /* Prevent horizontal scrolling */
            html, body {
                overflow-x: hidden;
                max-width: 100%;
            }
        }
        
        /* FIX: Responsive image handling with fallback */
        .responsive-img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        /* Fallback for missing images */
        .img-fallback {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-2">
        <div class="container mx-auto px-4 md:px-6"> <!-- FIX: Responsive padding -->
            <div class="flex flex-col md:flex-row justify-between items-center text-sm space-y-2 md:space-y-0"> <!-- FIX: Mobile stacking -->
                <div class="flex flex-col md:flex-row items-center space-y-1 md:space-y-0 md:space-x-6 text-center md:text-left">
                    <span class="flex items-center justify-center md:justify-start space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+880 1234-567890</span>
                    </span>
                    <span class="flex items-center justify-center md:justify-start space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>support@jerseyshop.com</span>
                    </span>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-1 md:space-y-0 md:space-x-4 text-center">
                    <span class="text-xs md:text-sm">🔥 Free Shipping on Orders Over TK2000!</span>
                    <div class="flex space-x-3">
                        <!-- Social icons -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
   <!-- Main Navigation - ORIGINAL WITH RESPONSIVE FIXES -->
<!-- Main Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white px-4 py-3 rounded-xl font-bold text-2xl shadow-lg group-hover:shadow-xl transition-all transform group-hover:scale-105">
                    JS
                </div>
                <div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Jersey Shop</span>
                    <p class="text-xs text-gray-500">Premium Football Jerseys</p>
                </div>
            </a>
            
            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="hidden lg:block flex-1 max-w-xl mx-8">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search for your favorite team jerseys..." 
                        class="w-full px-6 py-3 pl-12 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    <svg class="w-5 h-5 absolute left-4 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <button type="submit" class="absolute right-2 top-1.5 bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition font-semibold">
                        Search
                    </button>
                </div>
            </form>

            <!-- Desktop Navigation Links & Actions -->
            <div class="hidden md:flex items-center space-x-6">
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Home</span>
                    </a>
                  <a href="{{ route('all.products') }}"
   class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 font-semibold transition">
    
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
    </svg>

    <span>Shop</span>
</a>

                    <a href="#categories" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>Categories</span>
                    </a>
                </div>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Admin</span>
                        </a>
                    @endif
                    <a href="{{ route('cart.view') }}" class="relative text-gray-700 hover:text-blue-600 transition group">
                        <div class="relative">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            @php
    $cartCount = auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->count() : 0;
@endphp
@if($cartCount > 0)
<span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse">
    {{ $cartCount }}
</span>
@endif
                        </div>
                    </a>
                    <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2.5 rounded-full hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md hover:shadow-lg flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('cart.view') }}" class="relative text-gray-700 hover:text-blue-600 transition group">
                        <div class="relative">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2.5 rounded-full hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md hover:shadow-lg">
                        Sign Up
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button (3 lines/hamburger) - ALWAYS VISIBLE ON MOBILE -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Search Bar -->
    <form action="{{ route('search') }}" method="GET" class="lg:hidden container mx-auto px-6 py-3 border-t border-gray-200">
        <div class="relative">
            <input type="text" name="search" placeholder="Search jerseys..." 
                class="w-full px-6 py-3 pl-12 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-base">
            <svg class="w-5 h-5 absolute left-4 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
    </form>
    
    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="md:hidden bg-white border-t border-gray-200 py-4 px-6 hidden">
        <div class="flex flex-col space-y-4">
            <a href="/" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="text-lg">Home</span>
            </a>
            
            <a href="{{ route('all.products') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <span class="text-lg">Shop</span>
            </a>
            
            <a href="#categories" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="text-lg">Categories</span>
            </a>
            
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-lg">Admin</span>
                    </a>
                @endif
                
                <a href="{{ route('cart.view') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-lg">Cart</span>
                    @if($cartCount > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                
                <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold transition flex items-center justify-center space-x-3 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="text-lg">Dashboard</span>
                </a>
                
            @else
                <!-- Cart for non-logged in users -->
                <a href="{{ route('cart.view') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition flex items-center space-x-3 py-3 border-b border-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-lg">Cart</span>
                </a>
                
                <!-- Login/Signup for non-logged in users -->
                <div class="pt-2 space-y-3">
                    <a href="{{ route('login') }}" class="block text-center text-gray-700 hover:text-blue-600 font-semibold transition py-3 border-2 border-blue-600 rounded-lg hover:bg-blue-50">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition font-semibold shadow-md hover:shadow-lg">
                        Sign Up
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white overflow-hidden min-h-[500px] md:min-h-[600px]"> <!-- FIX: Mobile height -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20" 
             style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div>
        
        <div class="container mx-auto px-4 md:px-6 py-16 md:py-24 relative z-10"> <!-- FIX: Responsive padding -->
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center"> <!-- FIX: Mobile stacking -->
                <!-- Left Content -->
                <div class="text-center md:text-left fade-in-up">
                    <span class="inline-block bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        ⚽ #1 Jersey Shop in Bangladesh
                    </span>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight"> <!-- FIX: Responsive text -->
                        Premium Football <span class="text-yellow-300">Jerseys</span>
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl mb-6 md:mb-8 text-blue-100"> <!-- FIX: Responsive text -->
                        Wear Your Pride. Support Your Team. Authentic Quality Guaranteed.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start"> <!-- FIX: Mobile button layout -->
                        <a href="#products" class="bg-white text-blue-600 px-6 md:px-8 py-3 md:py-4 rounded-full font-bold text-base md:text-lg hover:bg-gray-100 transition shadow-xl hover-scale inline-flex items-center justify-center space-x-2 mobile-touch-target">
                            <span>Shop Now</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#categories" class="bg-transparent border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 rounded-full font-bold text-base md:text-lg hover:bg-white hover:text-blue-600 transition shadow-xl mobile-touch-target text-center">
                            View Categories
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 md:gap-6 mt-8 md:mt-12"> <!-- FIX: Mobile spacing -->
                        <div>
                            <p class="text-2xl md:text-3xl font-bold">{{ \App\Models\Product::count() }}+</p>
                            <p class="text-blue-200 text-xs md:text-sm">Products</p>
                        </div>
                        <div>
                            <p class="text-2xl md:text-3xl font-bold">{{ \App\Models\Order::count() }}+</p>
                            <p class="text-blue-200 text-xs md:text-sm">Happy Customers</p>
                        </div>
                        <div>
                            <p class="text-2xl md:text-3xl font-bold">4.9</p>
                            <p class="text-blue-200 text-xs md:text-sm">Rating ⭐</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Image -->
                <div class="hidden md:block mt-8 md:mt-0">
                    <!-- FIX: Responsive image with fallback -->
                    <div class="relative w-full h-64 md:h-auto">
                        <img src="{{ asset('images/banner.png') }}" 
                             alt="Jersey" 
                             class="w-full h-full object-contain animate-float"
                             onerror="this.onerror=null; this.classList.add('img-fallback'); this.innerHTML='<span>Jersey Image</span>';">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 md:py-16 bg-gray-50"> <!-- FIX: Mobile padding -->
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid md:grid-cols-3 gap-6 md:gap-8"> <!-- FIX: Mobile stacking -->
                <!-- Feature items with responsive adjustments -->
            </div>
        </div>
    </section>

<section id="categories" class="py-12 md:py-20 bg-white">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center mb-8 md:mb-16">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Shop by Category</h2>
            <p class="text-gray-600 text-base md:text-lg">Find jerseys from your favorite teams and leagues</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            @foreach($categories as $category)
            <a href="{{ route('category.products', $category->slug) }}" class="block group">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl shadow-md p-6 md:p-8 text-center hover:shadow-2xl transition-all cursor-pointer border-2 border-transparent hover:border-blue-500 h-full flex flex-col items-center">
                    
                    <div class="w-24 h-24 md:w-32 md:h-32 rounded-full flex-shrink-0 flex items-center justify-center mb-4 overflow-hidden bg-white shadow-inner border border-gray-100">
                        @if($category->image)
                            <img src="{{ asset('images/categories/'.$category->image) }}" 
                                 alt="{{ $category->name }}" 
                                 class="w-full h-full object-cover object-center aspect-square"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            
                            <span class="hidden text-blue-600 text-3xl md:text-4xl font-bold uppercase">
                                {{ substr($category->name, 0, 1) }}
                            </span>
                        @else
                            <span class="text-blue-600 text-3xl md:text-4xl font-bold uppercase">
                                {{ substr($category->name, 0, 1) }}
                            </span>
                        @endif
                    </div>

                    <h3 class="font-bold text-lg md:text-xl text-gray-800 mb-2">{{ $category->name }}</h3>
                    <p class="text-blue-600 font-semibold text-sm md:text-base">{{ $category->products_count ?? $category->products->count() }} Products</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

    <!-- Products Section -->
    <section id="products" class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-8 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Latest Arrivals</h2>
                <p class="text-gray-600 text-base md:text-lg">Discover our newest collection of premium jerseys</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8"> <!-- FIX: Mobile grid -->
                @foreach($products as $product)
                <a href="{{ route('product.show', $product->slug) }}" class="block">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all hover-scale h-full">
                        <div class="relative overflow-hidden aspect-square"> <!-- FIX: Consistent image ratio -->
                            <!-- FIX: Product image with robust fallback -->
                            <img src="{{ asset('images/products/'.$product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover responsive-img"
                                 onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjNjY3ZWVhIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIyNCIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5KZXJzZXk8L3RleHQ+PC9zdmc+'; this.classList.add('img-fallback');">
                            @if($product->discount_price)
                                <span class="absolute top-3 right-3 bg-red-500 text-white px-2 py-1 rounded-full text-xs md:text-sm font-bold">
                                    SALE
                                </span>
                            @endif
                            <span class="absolute top-3 left-3 bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $product->category->name }}
                            </span>
                        </div>
                        <div class="p-4 md:p-6">
                            <h3 class="font-bold text-base md:text-lg mb-2 md:mb-3 text-gray-800 hover:text-blue-600 transition">{{ $product->name }}</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    @if($product->discount_price)
                                        <span class="text-gray-400 line-through text-sm block">TK{{ number_format($product->price, 0) }}</span>
                                        <span class="text-blue-600 font-bold text-xl md:text-2xl">TK{{ number_format($product->discount_price, 0) }}</span>
                                    @else
                                        <span class="text-blue-600 font-bold text-xl md:text-2xl">TK{{ number_format($product->price, 0) }}</span>
                                    @endif
                                </div>
                                <div class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition mobile-touch-target">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="text-center mt-8 md:mt-12">
                <a href="{{ route('all.products') }}" class="inline-block bg-blue-600 text-white px-6 md:px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition shadow-lg hover-scale mobile-touch-target text-base md:text-lg">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Continue with other sections (Testimonials, Brands, Footer) with similar responsive fixes -->

    <!-- JavaScript for Mobile Menu -->
    <script>
        // FIX: Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    mobileMenu.classList.toggle('flex');
                    mobileMenu.classList.toggle('flex-col');
                    mobileMenu.classList.add('bg-white', 'p-4', 'rounded-lg', 'shadow-lg', 'mt-2');
                });
            }
            
            // FIX: Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (mobileMenu && !mobileMenu.contains(event.target) && 
                    mobileMenuBtn && !mobileMenuBtn.contains(event.target) &&
                    !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex', 'flex-col');
                }
            });
            
            // FIX: Image fallback handler
            document.querySelectorAll('img').forEach(img => {
                img.addEventListener('error', function() {
                    if (!this.classList.contains('img-fallback')) {
                        this.classList.add('img-fallback');
                        this.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                        this.style.display = 'flex';
                        this.style.alignItems = 'center';
                        this.style.justifyContent = 'center';
                        this.style.color = 'white';
                        this.style.fontWeight = 'bold';
                        this.innerHTML = '<span>' + (this.alt || 'Image') + '</span>';
                    }
                });
            });
        });
    </script>



    <!-- Popular Teams -->
<!-- <section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Popular Team Jerseys</h3>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-6">
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">Barcelona</p>
                <a href="http://127.0.0.1:8000/product/barcelona-new">Barcelona</a>
            </div>
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">Real Madrid</p>
            </div>
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">Man United</p>
            </div>
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">Liverpool</p>
            </div>
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">PSG</p>
            </div>
            <div class="text-center group cursor-pointer">
                <div class="bg-gray-100 rounded-full w-20 h-20 mx-auto mb-3 flex items-center justify-center group-hover:bg-blue-600 transition">
                    <span class="text-2xl">⚽</span>
                </div>
                <p class="text-sm font-semibold">Bayern</p>
            </div>
        </div>
    </div>
</section> -->


    <!-- Testimonials -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">What Our Customers Say</h2>
            <p class="text-gray-600 text-lg">Don't just take our word for it</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">A</div>
                    <div>
                        <p class="font-bold">Ahmed Khan</p>
                        <div class="text-yellow-400">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="text-gray-600">"Best quality jerseys in Bangladesh! Got my Barcelona jersey and it's authentic. Highly recommend!"</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">R</div>
                    <div>
                        <p class="font-bold">Rafiq Islam</p>
                        <div class="text-yellow-400">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="text-gray-600">"Fast delivery and great customer service. The jersey quality is premium!"</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">S</div>
                    <div>
                        <p class="font-bold">Sadia Rahman</p>
                        <div class="text-yellow-400">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="text-gray-600">"Bought jerseys for my whole family. Amazing experience and quality products!"</p>
            </div>
        </div>
    </div>
</section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Support Your Team?</h2>
            <p class="text-xl text-blue-100 mb-8">Join thousands of satisfied customers</p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-xl hover-scale">
                Create Account Now
            </a>
        </div>
    </section>


<!-- Brands Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-6">
        
        <!-- Heading -->
        <h3 class="text-center text-3xl font-extrabold mb-14 text-gray-800 tracking-wide">
            Official Partners
        </h3>

        <!-- Brands Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 items-center justify-items-center">
            
            <!-- Brand Card -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/brands/nike.png') }}" 
                     alt="Nike" 
                     class="h-12 grayscale hover:grayscale-0 transition duration-300">
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/brands/adidas.png') }}" 
                     alt="Adidas" 
                     class="h-12 grayscale hover:grayscale-0 transition duration-300">
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/brands/puma.png') }}" 
                     alt="Puma" 
                     class="h-12 grayscale hover:grayscale-0 transition duration-300">
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/brands/umbro.jpg') }}" 
                     alt="Umbro" 
                     class="h-12 grayscale hover:grayscale-0 transition duration-300">
            </div>

        </div>
    </div>
</section>


    <!-- Footer -->
   <!-- Footer -->
<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-6 py-16">
        <div class="grid md:grid-cols-5 gap-12">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white px-4 py-3 rounded-xl font-bold text-2xl shadow-lg">
                        JS
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Jersey Shop</h3>
                        <p class="text-gray-400 text-sm">Premium Jerseys</p>
                    </div>
                </div>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Your trusted destination for authentic football jerseys. We bring you the latest designs from top teams around the world with guaranteed quality and fast delivery.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-800 hover:bg-blue-600 p-3 rounded-full transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-pink-600 p-3 rounded-full transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-blue-400 p-3 rounded-full transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-red-600 p-3 rounded-full transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Quick Links
                    <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-600 rounded"></span>
                </h4>
                <ul class="space-y-3">
                    <li><a href="/" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Home</span>
                    </a></li>
                    <li><a href="#products" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Shop</span>
                    </a></li>
                    <li><a href="#categories" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Categories</span>
                    </a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>About Us</span>
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Contact</span>
                    </a></li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Customer Service
                    <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-600 rounded"></span>
                </h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Help Center</span>
                    </a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Track Order</span>
                    </a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Shipping Info</span>
                    </a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Returns</span>
                    </a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white hover:pl-2 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span>Size Guide</span>
                    </a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Contact Us
                    <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-600 rounded"></span>
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3 text-gray-400">
                        <svg class="w-5 h-5 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Dhaka, Bangladesh</span>
                    </li>
                    <li class="flex items-start space-x-3 text-gray-400">
                        <svg class="w-5 h-5 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>01404881212</span>
                    </li>
                    <li class="flex items-start space-x-3 text-gray-400">
                        <svg class="w-5 h-5 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>arifur12877@gmail.com</span>
                    </li>
                </ul>
                <div class="mt-6">
                    <h5 class="font-semibold mb-3">We Accept</h5>
                    <div class="flex space-x-2">
                        <div class="bg-white p-2 rounded">
                           <span class="text-red-600 font-bold text-sm">Bkash</span>
                        </div>
                        <div class="bg-white p-2 rounded">
                            <span class="text-red-600 font-bold text-sm">NAGAD</span>
                        </div>
                        <div class="bg-white p-2 rounded">
                            <span class="text-purple-600 font-bold text-sm">ROCKET</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h4 class="text-xl font-bold mb-2">Subscribe to Our Newsletter</h4>
                    <p class="text-gray-400">Get the latest updates on new products and upcoming sales</p>
                </div>
                <div class="flex w-full md:w-auto">
                    <input type="email" placeholder="Enter your email" 
                        class="px-6 py-3 rounded-l-full w-full md:w-80 text-gray-900 focus:outline-none">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-r-full font-semibold transition">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p>&copy; Designed & Developed by Arifur Rahman</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="https://github.com/arifur128" class="hover:text-white transition">Github</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (mobileMenuBtn && mobileMenu) {
            // Toggle mobile menu on button click
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('block');
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && 
                    !mobileMenuBtn.contains(event.target) &&
                    !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('block');
                }
            });
            
            // Close menu when clicking on a link inside it
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('block');
                });
            });
        }
        
        // Image fallback for mobile devices
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                // If image fails to load, show a fallback
                if (!this.hasAttribute('data-fallback-set')) {
                    this.setAttribute('data-fallback-set', 'true');
                    
                    // Create fallback content based on image type
                    const isProduct = this.src.includes('/products/');
                    const isCategory = this.src.includes('/categories/');
                    const isHero = this.src.includes('hero-bg') || this.src.includes('banner');
                    
                    if (isProduct) {
                        this.outerHTML = `
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg rounded-lg">
                                Jersey
                            </div>
                        `;
                    } else if (isCategory) {
                        const altText = this.alt || 'Category';
                        this.outerHTML = `
                            <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold text-xl rounded-full">
                                ${altText.charAt(0)}
                            </div>
                        `;
                    } else if (isHero) {
                        // Keep hero background gradient
                        this.style.display = 'none';
                    }
                }
            });
        });
    });
</script>
</body>
</html>