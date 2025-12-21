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
    // Menampilkan halaman cart
    public function index()
    {
        // Ambil semua cart items milik user yang login
        $cartItems = Cart::with(['product', 'size'])
            ->where('user_id', auth()->id())
            ->get();

        // Hitung additional_price dan subtotal
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


    // Menambahkan item ke cart
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cek apakah produk+size sudah ada di cart
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $validated['product_id'])
            ->where('size_id', $validated['size_id'])
            ->first();

        if ($existingCartItem) {
            // Update quantity
            $existingCartItem->increment('quantity', $validated['quantity']);
        } else {
            // Buat cart item baru
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'size_id' => $validated['size_id'],
                'quantity' => $validated['quantity'],
            ]);
        }

        return redirect()->route('user.cart')->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }

    // Hapus item dari cart
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        // Cek kepemilikan
        if ($cart->user_id != auth()->id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('user.cart')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // Update quantity via AJAX
    public function updateQuantity(Request $request, Cart $cart)
    {
        if ($cart->user_id != auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $request->validate(['quantity' => 'required|integer|min:1']);

        // Update quantity di DB
        $cart->update(['quantity' => $request->quantity]);

        return response()->json(['success' => true, 'quantity' => $cart->quantity]);
    }


    // Update size via AJAX
    public function updateSize(Request $request, Cart $cart)
    {
        // =========================
        // AUTH CHECK
        // =========================
        if ($cart->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // =========================
        // VALIDATION
        // =========================
        $request->validate([
            'size_id' => 'nullable|exists:sizes,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        // =========================
        // DEFAULT VALUE
        // =========================
        $quantity = $request->quantity ?? $cart->quantity;

        // =========================
        // IF SIZE SELECTED
        // =========================
        if ($request->size_id) {

            // Ambil size + pivot stock
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

            // Jika stok 0, paksa quantity 1 (aman)
            if ($stock <= 0) {
                $quantity = 1;
            } else {
                // Potong quantity jika melebihi stok
                $quantity = min($quantity, $stock);
            }

        } else {
            // =========================
            // SIZE DIHAPUS (NULL)
            // =========================
            $quantity = max(1, $quantity);
        }

        // =========================
        // UPDATE CART
        // =========================
        $cart->update([
            'size_id'  => $request->size_id,
            'quantity' => $quantity
        ]);

        // =========================
        // RESPONSE
        // =========================
        return response()->json([
            'success'  => true,
            'quantity' => $quantity
        ]);
    }


}
