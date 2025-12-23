<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Jersey Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-2">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs md:text-sm space-y-2 md:space-y-0">
                <div class="flex items-center space-x-4 md:space-x-6">
                    <span class="flex items-center space-x-2">
                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+880 1234-567890</span>
                    </span>
                    <span class="hidden sm:flex items-center space-x-2">
                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>support@jerseyshop.com</span>
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-[10px] md:text-sm">🔥 Free Shipping on Orders Over TK2000!</span>
                </div>
            </div>
        </div>
    </div>

    <nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="/" class="flex items-center space-x-2 md:space-x-3 group">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white px-3 py-2 md:px-4 md:py-3 rounded-lg md:rounded-xl font-bold text-lg md:text-2xl shadow-lg transition-all transform group-hover:scale-105">
                        JS
                    </div>
                    <div class="leading-tight">
                        <span class="text-lg md:text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Jersey Shop</span>
                        <p class="hidden sm:block text-[10px] md:text-xs text-gray-500">Premium Football Jerseys</p>
                    </div>
                </a>
                
                <form action="{{ route('search') }}" method="GET" class="hidden lg:block flex-1 max-w-xl mx-8">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search jerseys..." 
                            class="w-full px-6 py-3 pl-12 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <svg class="w-5 h-5 absolute left-4 top-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>

                <div class="flex items-center space-x-3 md:space-x-6">
                    @auth
                        <a href="{{ route('cart.view') }}" class="relative text-gray-700 hover:text-blue-600 transition p-1">
                            <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            @php $cartCount = auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->count() : 0; @endphp
                            @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold rounded-full h-4 w-4 md:h-5 md:w-5 flex items-center justify-center animate-pulse">
                                {{ $cartCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white p-2 md:px-6 md:py-2.5 rounded-full font-semibold shadow-md flex items-center space-x-2 text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="hidden md:inline">Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-sm">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 md:px-6 md:py-2.5 rounded-full font-semibold text-sm shadow-md">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="/" class="hover:text-blue-600">Home</a>
                <span>/</span>
                <a href="/#products" class="hover:text-blue-600">Products</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">{{ $product->name }}</span>
            </div>
        </div>
    </div>

    <!-- Product Details -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Product Image -->
                    <div class="relative bg-gray-100">
                        <img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @if($product->discount_price)
                            <span class="absolute top-6 right-6 bg-red-500 text-white px-4 py-2 rounded-full font-bold shadow-lg">
                                SALE
                            </span>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="p-8 md:p-12">
                        <div class="inline-block bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm font-semibold mb-4">
                            {{ $product->category->name }}
                        </div>
                        
                        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                        
                        <!-- Price -->
                        <div class="mb-6">
                            @if($product->discount_price)
                                <div class="flex items-center space-x-3">
                                    <span class="text-gray-400 line-through text-2xl">TK{{ number_format($product->price, 0) }}</span>
                                    <span class="text-blue-600 font-bold text-5xl">TK{{ number_format($product->discount_price, 0) }}</span>
                                </div>
                                <div class="mt-2">
                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                        Save TK{{ number_format($product->price - $product->discount_price, 0) }}
                                    </span>
                                </div>
                            @else
                                <span class="text-blue-600 font-bold text-5xl">TK{{ number_format($product->price, 0) }}</span>
                            @endif
                        </div>

                        <!-- Description -->
                        @if($product->description)
                        <div class="mb-6 pb-6 border-b">
                            <h3 class="font-semibold text-lg mb-2 text-gray-800">Description</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>
                        @endif

                        <!-- Product Details -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <span class="text-gray-700"><strong>Size:</strong> {{ $product->size ?? 'Standard' }}</span>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <span class="text-gray-700">
                                    <strong>Stock:</strong> 
                                    @if($product->stock > 0)
                                        <span class="text-green-600 font-semibold">{{ $product->stock }} Available</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Out of Stock</span>
                                    @endif
                                </span>
                            </div>

                            @if($product->sizes->count() > 0)
<div class="flex items-center space-x-3">
    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
    </svg>
    <div>
        <span class="text-gray-700"><strong>Available Sizes:</strong></span>
        <div class="flex gap-2 mt-2" id="sizesContainer">
            @foreach($product->sizes as $size)
            <button type="button" 
                onclick="selectSize('{{ $size->size }}', {{ $size->stock }}, {{ $size->price_adjustment }})"
                class="size-btn px-4 py-2 border-2 border-gray-300 rounded-lg hover:border-blue-600 transition font-semibold"
                data-size="{{ $size->size }}">
                {{ $size->size }}
                @if($size->stock == 0)
                    <span class="text-xs text-red-600 block">(Out of Stock)</span>
                @endif
            </button>
            @endforeach
        </div>
        <p class="text-sm text-red-600 mt-2 hidden" id="sizeError">Please select a size</p>
    </div>
</div>
@endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                           @if($product->stock > 0 || $product->sizes->count() > 0)
    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm" onsubmit="return validateSize()">
        @csrf
        <input type="hidden" name="size" id="selectedSize" value="">
        <input type="hidden" name="selected_stock" id="selectedStock" value="{{ $product->stock }}">
        <button type="submit" class="w-full bg-blue-600 text-white px-8 py-4 rounded-xl text-lg font-bold hover:bg-blue-700 transition shadow-lg hover-scale flex items-center justify-center space-x-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span>Add to Cart</span>
        </button>
    </form>
                            @else
                                <button class="w-full bg-gray-400 text-white px-8 py-4 rounded-xl text-lg font-bold cursor-not-allowed" disabled>
                                    Out of Stock
                                </button>
                            @endif
                            
                            <a href="/" class="block w-full text-center bg-gray-100 text-gray-700 px-8 py-4 rounded-xl text-lg font-bold hover:bg-gray-200 transition">
                                Continue Shopping
                            </a>
                        </div>

                        <!-- Features -->
                        <div class="mt-8 pt-8 border-t">
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <svg class="w-8 h-8 mx-auto text-green-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-xs text-gray-600 font-medium">Authentic Quality</p>
                                </div>
                                <div>
                                    <svg class="w-8 h-8 mx-auto text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-xs text-gray-600 font-medium">Fast Delivery</p>
                                </div>
                                <div>
                                    <svg class="w-8 h-8 mx-auto text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    <p class="text-xs text-gray-600 font-medium">Secure Payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
let selectedSize = '';
let selectedStock = 0;
let basePrice = {{ $product->discount_price ?? $product->price }};

function selectSize(size, stock, priceAdjustment) {
    selectedSize = size;
    selectedStock = stock;
    
    // Update hidden fields
    document.getElementById('selectedSize').value = size;
    document.getElementById('selectedStock').value = stock;
    
    // Update button styles
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.classList.remove('border-blue-600', 'bg-blue-50', 'text-blue-600');
        btn.classList.add('border-gray-300');
    });
    
    event.target.closest('.size-btn').classList.remove('border-gray-300');
    event.target.closest('.size-btn').classList.add('border-blue-600', 'bg-blue-50', 'text-blue-600');
    
    // Hide error
    document.getElementById('sizeError').classList.add('hidden');
    
    // Update price if there's adjustment
    if(priceAdjustment != 0) {
        const newPrice = basePrice + parseFloat(priceAdjustment);
        // You can update price display here if needed
    }
}

function validateSize() {
    @if($product->sizes->count() > 0)
        if(!selectedSize) {
            document.getElementById('sizeError').classList.remove('hidden');
            return false;
        }
        if(selectedStock == 0) {
            alert('Selected size is out of stock!');
            return false;
        }
    @endif
    return true;
}
</script>
</body>
</html>