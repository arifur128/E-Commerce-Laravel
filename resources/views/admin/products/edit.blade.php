<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Jersey Shop Admin</title>
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
                    <h2 class="text-3xl font-bold">Edit Product</h2>
                    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                        Back to List
                    </a>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name *</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Category *</label>
                                <select name="category_id" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Price *</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                @error('price')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Discount Price</label>
                                <input type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" step="0.01"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Stock Quantity *</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" required>
                                @error('stock')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Size</label>
                                <input type="text" name="size" value="{{ old('size', $product->size) }}"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <textarea name="description" rows="4" 
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Current Image</label>
                                <img src="{{ asset('images/products/'.$product->image) }}" class="w-32 h-32 object-cover rounded mb-3">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2">Change Image (Optional)</label>
                                <input type="file" name="image" accept="image/*"
                                    class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        <div class="col-span-2">
    <label class="block text-gray-700 text-sm font-bold mb-2">Additional Images</label>

    <div class="col-span-2">
    <label class="block text-gray-700 text-sm font-bold mb-2">Product Sizes & Stock</label>
    <div id="sizesContainer" class="space-y-3">
        @if($product->sizes->count() > 0)
            @foreach($product->sizes as $size)
            <div class="flex gap-3 items-center size-row">
                <input type="text" name="sizes[]" value="{{ $size->size }}" placeholder="Size (e.g. S, M, L)" 
                    class="flex-1 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <input type="number" name="size_stocks[]" value="{{ $size->stock }}" placeholder="Stock" min="0"
                    class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <input type="number" name="size_price_adjustments[]" value="{{ $size->price_adjustment }}" placeholder="Price +/-" step="0.01"
                    class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <button type="button" onclick="removeSize(this)" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Remove</button>
            </div>
            @endforeach
        @else
            <div class="flex gap-3 items-center size-row">
                <input type="text" name="sizes[]" placeholder="Size (e.g. S, M, L)" 
                    class="flex-1 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <input type="number" name="size_stocks[]" placeholder="Stock" min="0"
                    class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <input type="number" name="size_price_adjustments[]" placeholder="Price +/-" step="0.01"
                    class="w-32 px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
                <button type="button" onclick="removeSize(this)" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Remove</button>
            </div>
        @endif
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

    
    @if($product->images->count() > 0)
        <div class="grid grid-cols-4 gap-4 mb-4">
            @foreach($product->images as $img)
            <div class="relative">
                <img src="{{ asset('images/products/'.$img->image) }}" class="w-full h-24 object-cover rounded">
                <form action="{{ route('admin.products.deleteImage', $img->id) }}" method="POST" class="absolute top-1 right-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white p-1 rounded-full hover:bg-red-700" onclick="return confirm('Delete this image?')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    @endif
    
    <label class="block text-gray-700 text-sm font-bold mb-2">Add More Images (Optional)</label>
    <input type="file" name="additional_images[]" accept="image/*" multiple
        class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
    <p class="text-sm text-gray-500 mt-1">You can select multiple images</p>
</div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>