<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images/products'), $imageName);

    $product = Product::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'description' => $request->description,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
        'stock' => $request->stock,
        'size' => $request->size,
        'image' => $imageName,
    ]);

    // Handle product sizes
    if($request->has('sizes')) {
        foreach($request->sizes as $index => $size) {
            if(!empty($size)) {
                \App\Models\ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => $request->size_stocks[$index] ?? 0,
                    'price_adjustment' => $request->size_price_adjustments[$index] ?? 0,
                ]);
            }
        }
    }

    // Handle multiple images
    if($request->hasFile('additional_images')) {
        foreach($request->file('additional_images') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            
            \App\Models\ProductImage::create([
                'product_id' => $product->id,
                'image' => $imageName
            ]);
        }
    }

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
}


    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::where('is_active', true)->get();
    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    
    $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'description' => $request->description,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
        'stock' => $request->stock,
        'size' => $request->size,
    ];

    if($request->hasFile('image')) {
        // Delete old image
        if(file_exists(public_path('images/products/'.$product->image))) {
            unlink(public_path('images/products/'.$product->image));
        }
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);
        $data['image'] = $imageName;
    }

    $product->update($data);

    // Handle product sizes
if($request->has('sizes')) {
    // Delete old sizes
    \App\Models\ProductSize::where('product_id', $product->id)->delete();
    
    // Add new sizes
    foreach($request->sizes as $index => $size) {
        if(!empty($size)) {
            \App\Models\ProductSize::create([
                'product_id' => $product->id,
                'size' => $size,
                'stock' => $request->size_stocks[$index] ?? 0,
                'price_adjustment' => $request->size_price_adjustments[$index] ?? 0,
            ]);
        }
    }
}

// Handle multiple images


    // Handle multiple images
if($request->hasFile('additional_images')) {
    foreach($request->file('additional_images') as $image) {
        $imageName = time() . '_' . uniqid() . '.' . $image->extension();
        $image->move(public_path('images/products'), $imageName);
        
        \App\Models\ProductImage::create([
            'product_id' => $product->id,
            'image' => $imageName
        ]);
    }
}



    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    
    // Delete image
    if(file_exists(public_path('images/products/'.$product->image))) {
        unlink(public_path('images/products/'.$product->image));
    }
    
    $product->delete();
    
    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
}

public function deleteImage($id)
{
    $image = \App\Models\ProductImage::findOrFail($id);
    
    // Delete image file
    if(file_exists(public_path('images/products/'.$image->image))) {
        unlink(public_path('images/products/'.$image->image));
    }
    
    $image->delete();
    
    return redirect()->back()->with('success', 'Image deleted successfully!');
}
}