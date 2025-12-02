<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id, $slug)
    {
        $product = Product::with(['sizes' => function ($query) {
            $query->orderBy('sort_order', 'asc');
        }])->where('id', $id)->firstOrFail();

        // Opsional: cek slug benar, kalau beda redirect ke slug asli
        if ($product->slug !== $slug) {
            return redirect()->route('product.show', [
                'id' => $product->id,
                'slug' => $product->slug
            ]);
        }

        return view('products.show', compact('product'));
    }


    public function index()
    {
        $products = Product::with('sizes')
            ->when(request('size'), function ($query, $size) {
                $query->whereHas('sizes', function ($q) use ($size) {
                    $q->where('code', $size)
                      ->where('product_sizes.stock', '>', 0);
                });
            })
            ->paginate(12);

        $sizes = Size::orderBy('sort_order')->get(); // Update ini

        return view('products.index', compact('products', 'sizes'));
    }
}
