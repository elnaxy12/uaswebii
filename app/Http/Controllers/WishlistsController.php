<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistsController extends Controller
{
    public function index()
    {
        $items = Wishlist::with('product:id,name,image,badge,price,slug')
                         ->where('user_id', Auth::id())
                         ->get();

        return view('index2.wishlists', compact('items'));
    }

    public function store(Request $request)
    {
        $exists = Wishlist::where('user_id', Auth::id())
                          ->where('product_id', $request->product_id)
                          ->exists();

        if ($exists) {
            return redirect()->route('user.wishlists')
            ->with('success');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);


        return redirect()->route('user.wishlists')
        ->with('success');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $wishlist->delete();

        return redirect()->route('user.wishlists')
                         ->with('success', 'Item berhasil dihapus dari wishlist.');
    }

}
