<?php
// app/Http/Controllers/Admin/ProductController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();
        
        return view('admin.products.create', compact('sizes', 'categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes' => 'array',
            'sizes.*.size_id' => 'required|exists:sizes,id',
            'sizes.*.stock' => 'required|integer|min:0',
        ]);
        
        // Upload image
        $imagePath = $request->file('image')->store('products', 'public');
        
        // Create product
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'badge' => $request->badge,
            'is_active' => $request->has('is_active'),
        ]);
        
        // Attach sizes with stock
        if ($request->has('sizes')) {
            foreach ($request->sizes as $sizeData) {
                $product->sizes()->attach($sizeData['size_id'], [
                    'stock' => $sizeData['stock'],
                    'additional_price' => $sizeData['additional_price'] ?? 0,
                ]);
            }
        }
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully with sizes.');
    }
    
    public function edit($id)
    {
        $product = Product::with('sizes')->findOrFail($id);
        $sizes = Size::all();
        $categories = Category::all();
        
        return view('admin.products.edit', compact('product', 'sizes', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        // Similar to store but with update logic
        // ...
    }
}