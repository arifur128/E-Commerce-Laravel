<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Jersey Shop Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Jersey Shop</h1>
                <p class="text-sm text-gray-400">Admin Panel</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-800">Dashboard</a>
                <a href="{{ route('admin.categories.index') }}" class="block px-6 py-3 hover:bg-gray-800">Categories</a>
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-3 hover:bg-gray-800">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-3 hover:bg-gray-800">Orders</a>
                <a href="{{ route('admin.settings') }}" class="block px-6 py-3 bg-gray-800 text-white">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                <h2 class="text-3xl font-bold mb-6">Settings</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold mb-6">Shipping Configuration</h3>
                    
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Shipping Charge (TK)
                            </label>
                            <input type="number" name="shipping_charge" value="{{ old('shipping_charge', $shippingCharge) }}" 
                                step="0.01" min="0"
                                class="w-full md:w-1/2 px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                placeholder="Enter shipping charge" required>
                            @error('shipping_charge')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-2">
                                Set to 0 for free shipping. This amount will be added to all orders.
                            </p>
                        </div>

                        <div class="flex justify-start">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Info Box -->
                <div class="mt-6 bg-blue-50 border-l-4 border-blue-600 p-4 rounded">
                    <p class="text-blue-800">
                        <strong>Note:</strong> Changes will be applied to all new orders immediately.
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>