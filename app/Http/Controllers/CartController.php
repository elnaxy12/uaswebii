<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Ambil semua cart items milik user yang login
        $cartItems = Cart::with(['product', 'size'])
            ->where('user_id', auth()->id())
            ->get();

        // Debug: Cek data
        // dd($cartItems);

        // Pastikan $cartItems selalu Collection, bukan null
        $cartItems = $cartItems ?? collect([]);

        return view('index2.cart', compact('cartItems'));
    }

    public function store(Request $request)
    {
        // Validasi SEMUA field yang dikirim form
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id', // ✅ PASTIKAN ADA
            'quantity' => 'required|integer|min:1',
        ]);

        // Cek apakah produk dengan size yang sama sudah ada di cart
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $validated['product_id'])
            ->where('size_id', $validated['size_id']) // ✅ TAMBAHKAN SIZE
            ->first();

        if ($existingCartItem) {
            // Update quantity jika sudah ada
            $existingCartItem->increment('quantity', $validated['quantity']);
            // $message = 'Jumlah produk di keranjang diperbarui!';
        } else {
            // Buat item keranjang baru dengan SEMUA data
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'size_id' => $validated['size_id'], // ✅ TAMBAHKAN SIZE
                'quantity' => $validated['quantity'],
            ]);
            // $message = 'Produk berhasil ditambahkan ke keranjang!';
        }

        return redirect()->route('user.cart')
            ->with('success');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        // Cek ownership
        if ($cart->user_id != auth()->id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('user.cart')
            ->with('success', 'Item removed from cart.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Update quantity
        $cart->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'price' => $cart->product->price,
            'quantity' => $cart->quantity
        ]);
    }

    public function updateSize(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'size_id' => 'required|exists:sizes,id'
        ]);

        // Update size
        $cart->update(['size_id' => $request->size_id]);

        return response()->json([
            'success' => true
        ]);
    }

    // ... method index tetap sama
}
