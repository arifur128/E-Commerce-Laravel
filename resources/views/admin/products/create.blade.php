<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Jersey Shop Admin</title>
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
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-3 bg-gray-800 text-white">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-3 hover:bg-gray-800">Orders</a>
                  </a>
    <a href="{{ route('admin.settings') }}" class="block px-6 py-3 hover:bg-gray-800">
    Settings
</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold">Add New Product</h2>
                    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                        Back to List
                    </a>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" 
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="e.g. Argentina Home Jersey 2024" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Category *</label>
                                <select name="category_id" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Price *</label>
                                <input type="number" name="price" value="{{ old('price') }}" step="0.01"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="0.00" required>
                                @error('price')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Discount Price</label>
                                <input type="number" name="discount_price" value="{{ old('discount_price') }}" step="0.01"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="0.00">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Stock Quantity *</label>
                                <input type="number" name="stock" value="{{ old('stock') }}"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="0" required>
                                @error('stock')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Size</label>
                                <input type="text" name="size" value="{{ old('size') }}"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="e.g. S, M, L, XL">
                            </div>

                            <div class="col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <textarea name="description" rows="4" 
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                    placeholder="Enter product description">{{ old('description') }}</textarea>
                            </div>

                            <div class="col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Product Image *</label>
                                <input type="file" name="image" accept="image/*"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        <div class="col-span-2">
    <label class="block text-gray-700 text-sm font-bold mb-2">Additional Images (Optional)</label>
    <input type="file" name="additional_images[]" accept="image/*" multiple
        class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
    <p class="text-sm text-gray-500 mt-1">You can select multiple images</p>
</div>

<div class="col-span-2">
    <label class="block text-gray-700 text-sm font-bold mb-2">Product Sizes & Stock</label>
    <div id="sizesContainer" class="space-y-3">
        <div class="flex gap-3 items-center size-row">
            <input type="text" name="sizes[]" placeholder="Size (e.g. S, M, L)" 
                class="flex-1 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
            <input type="number" name="size_stocks[]" placeholder="Stock" min="0"
                class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
            <input type="number" name="size_price_adjustments[]" placeholder="Price +/-" step="0.01"
                class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
            <button type="button" onclick="removeSize(this)" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Remove</button>
        </div>
    </div>
    <button type="button" onclick="addSize()" class="mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Add Size
    </button>
    <p class="text-sm text-gray-500 mt-2">Add different sizes with their stock quantity and optional price adjustment</p>
</div>

<script>
function addSize() {
    const container = document.getElementById('sizesContainer');
    const newRow = document.createElement('div');
    newRow.className = 'flex gap-3 items-center size-row';
    newRow.innerHTML = `
        <input type="text" name="sizes[]" placeholder="Size (e.g. S, M, L)" 
            class="flex-1 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
        <input type="number" name="size_stocks[]" placeholder="Stock" min="0"
            class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
        <input type="number" name="size_price_adjustments[]" placeholder="Price +/-" step="0.01"
            class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
        <button type="button" onclick="removeSize(this)" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Remove</button>
    `;
    container.appendChild(newRow);
}

function removeSize(button) {
    button.closest('.size-row').remove();
}
</script>

                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>