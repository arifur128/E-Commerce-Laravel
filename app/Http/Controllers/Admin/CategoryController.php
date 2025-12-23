<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
    ];

    if($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/categories'), $imageName);
        $data['image'] = $imageName;
    }

    Category::create($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
}

    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);
    
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
    ];

    if($request->hasFile('image')) {
        // Delete old image
        if($category->image && file_exists(public_path('images/categories/'.$category->image))) {
            unlink(public_path('images/categories/'.$category->image));
        }
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/categories'), $imageName);
        $data['image'] = $imageName;
    }

    $category->update($data);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);
    
    if($category->products()->count() > 0) {
        return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category with products!');
    }
    
    $category->delete();
    
    return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
}
}