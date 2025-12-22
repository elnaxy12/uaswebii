<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with(['product', 'size'])
            ->where('user_id', auth()->id())
            ->get();

        foreach ($cartItems as $item) {
            $item->additional_price = 0;
            if ($item->size_id) {
                $item->additional_price = DB::table('product_sizes')
                    ->where('product_id', $item->product->id)
                    ->where('size_id', $item->size_id)
                    ->value('additional_price') ?? 0;
            }

            $item->price = ($item->product->price ?? 0) + $item->additional_price;
            $item->subtotal = $item->price * $item->quantity;
        }

        return view('index2.cart', compact('cartItems'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $validated['product_id'])
            ->where('size_id', $validated['size_id'])
            ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity', $validated['quantity']);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'size_id' => $validated['size_id'],
                'quantity' => $validated['quantity'],
            ]);
        }

        return redirect()->route('user.cart')->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->user_id != auth()->id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('user.cart')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function updateQuantity(Request $request, Cart $cart)
    {
        if ($cart->user_id != auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $request->validate(['quantity' => 'required|integer|min:1']);

       $cart->update(['quantity' => $request->quantity]);

        return response()->json(['success' => true, 'quantity' => $cart->quantity]);
    }


    public function updateSize(Request $request, Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'size_id' => 'nullable|exists:sizes,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $quantity = $request->quantity ?? $cart->quantity;

        if ($request->size_id) {

            $size = $cart->product
                ->sizes()
                ->where('sizes.id', $request->size_id)
                ->first();

            if (!$size) {
                return response()->json([
                    'success' => false,
                    'message' => 'Size tidak valid untuk produk ini'
                ], 422);
            }

            $stock = (int) ($size->pivot->stock ?? 0);

            if ($stock <= 0) {
                $quantity = 1;
            } else {
                $quantity = min($quantity, $stock);
            }

        } else {
            $quantity = max(1, $quantity);
        }

        $cart->update([
            'size_id'  => $request->size_id,
            'quantity' => $quantity
        ]);

        return response()->json([
            'success'  => true,
            'quantity' => $quantity
        ]);
    }


}
