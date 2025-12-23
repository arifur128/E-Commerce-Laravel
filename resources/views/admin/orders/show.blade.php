<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Jersey Shop Admin</title>
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
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-3 bg-gray-800 text-white">Orders</a>
                <a href="{{ route('admin.settings') }}" class="block px-6 py-3 hover:bg-gray-800">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold">Order Details</h2>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.orders.invoice', $order->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                            Download Invoice
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                            Back to Orders
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid lg:grid-cols-3 gap-6">
                    <!-- Order Info -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Order Summary -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-xl font-bold mb-4">Order Information</h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Order Number</p>
                                    <p class="font-bold text-lg text-blue-600">{{ $order->order_number }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Order Date</p>
                                    <p class="font-semibold">{{ $order->created_at->format('d M, Y h:i A') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Payment Method</p>
                                    <p class="font-semibold">{{ ucfirst($order->payment_method) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Transaction ID</p>
                                    <p class="font-semibold">{{ $order->transaction_id }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Shipping Charge</p>
                                    <p class="font-semibold">TK{{ number_format(\App\Models\Setting::get('shipping_charge', 0), 0) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total Amount</p>
                                    <p class="font-bold text-xl text-green-600">TK{{ number_format($order->total_amount, 0) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Status</p>
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'completed') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-xl font-bold mb-4">Customer Information</h3>
                            <div class="space-y-2">
                                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                                <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address }}</p>
                            </div>
                        </div>

                        <!-- Order Note -->
                        @if($order->note)
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-xl font-bold mb-4">Order Note</h3>
                            <p class="text-gray-700 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">{{ $order->note }}</p>
                        </div>
                        @endif

                        <!-- Order Items -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-xl font-bold mb-4">Order Items</h3>
                            <div class="space-y-4">
                                @foreach($order->orderItems as $item)
                                <div class="flex items-center space-x-4 border-b pb-4">
                                    <img src="{{ asset('images/products/'.$item->product->image) }}" class="w-20 h-20 object-cover rounded">
                                    <div class="flex-1">
                                        <p class="font-semibold">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                        @if($item->size)
                                            <p class="text-sm text-blue-600 font-semibold">Size: {{ $item->size }}</p>
                                        @endif
                                        <p class="text-sm text-gray-600">Qty: {{ $item->quantity }} × TK{{ number_format($item->price, 0) }}</p>
                                    </div>
                                    <p class="font-bold text-blue-600">TK{{ number_format($item->price * $item->quantity, 0) }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow p-6 sticky top-8">
                            <h3 class="text-xl font-bold mb-4">Update Status</h3>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold mb-2">Order Status</label>
                                    <select name="status" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">
                                    Update Status
                                </button>
                            </form>

                            <div class="mt-6 pt-6 border-t">
                                <h4 class="font-semibold mb-3">Quick Info</h4>
                                <div class="space-y-2 text-sm">
                                    <p class="flex justify-between">
                                        <span class="text-gray-600">Items:</span>
                                        <span class="font-semibold">{{ $order->orderItems->count() }}</span>
                                    </p>
                                    <p class="flex justify-between">
                                        <span class="text-gray-600">Total Qty:</span>
                                        <span class="font-semibold">{{ $order->orderItems->sum('quantity') }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>