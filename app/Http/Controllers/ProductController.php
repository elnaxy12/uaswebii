<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with(['sizes' => function ($query) {
            $query->orderBy('sort_order', 'asc'); // Update ini
        }])->where('slug', $slug)->firstOrFail();

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
