<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - Jersey Shop Admin</title>
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
                <a href="{{ route('admin.categories.index') }}" class="block px-6 py-3 bg-gray-800 text-white">Categories</a>
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-3 hover:bg-gray-800">Products</a>
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
                    <h2 class="text-3xl font-bold">Edit Category</h2>
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                        Back to List
                    </a>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Category Name *</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                placeholder="Enter category name" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea name="description" rows="4" 
                                class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500" 
                                placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="mb-6">
    @if($category->image)
        <label class="block text-gray-700 text-sm font-bold mb-2">Current Image</label>
        <img src="{{ asset('images/categories/'.$category->image) }}" class="w-20 h-20 object-cover rounded-full mb-3">
    @endif
    
    <label class="block text-gray-700 text-sm font-bold mb-2">Category Image (Optional)</label>
    <input type="file" name="image" accept="image/*"
        class="w-full px-4 py-2 border rounded focus:outline-none focus:border-blue-500">
    <p class="text-sm text-gray-500 mt-1">Upload a new category icon/image</p>
</div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>