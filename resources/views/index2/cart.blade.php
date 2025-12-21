@extends('v_user.v_cart.app')

@section('content')
        <div class="md:pt-[14rem] pt-4 pl-5 flex flex-col gap-2 md:w-5xl w-full">
            <h2 class="text-2xl font-semibold mb-4">Shopping Cart</h2>


            @if ($cartItems->isEmpty())
                <p class="text-gray-500">Cart is still empty</p>
            @else
                {{-- Header --}}
                <div class="hidden md:grid grid-cols-4 w-full gap-4 items-center text-center font-bold mb-4">
                    <p>Name</p>
                    <p>Price</p>
                    <p>Total Price</p>
                    <p>Action</p>
                </div>
                {{-- Cart Items --}}
                @foreach ($cartItems as $item)
                    <div class="flex md:flex-row flex-col gap-4 mb-4 p-4 items-center border rounded-md shadow-sm"
                        id="cart-item-{{ $item->id }}">

                        {{-- Product Image --}}
                        @if($item->product && $item->product->image)
                            <a href="{{ route('product.show', ['id' => $item->product->id, 'slug' => $item->product->slug]) }}">
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                    class="md:w-20 md:h-20 w-40 h-40 object-cover rounded">
                            </a>
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif

                        {{-- Product Info --}}
                        <div class="grid md:grid-cols-4 grid-cols-1 w-full gap-4 items-center">
                            {{-- Name --}}
                            <a
                                href="{{ $item->product ? route('product.show', ['id' => $item->product->id, 'slug' => $item->product->slug]) : '#' }}">
                                <div class="text-xl md:text-2xl">
                                    {{ $item->product->name ?? 'Product Not Found' }}
                                </div>
                            </a>

                            <div class="price-per-item" data-cart-id="{{ $item->id }}"
                                data-base-price="{{ $item->product->price ?? 0 }}"
                                data-additional-price="{{ $item->size?->pivot->additional_price ?? 0 }}">
                                ${{ number_format(
            ($item->product->price ?? 0) + ($item->size?->pivot->additional_price ?? 0),
            2
        ) }}
                            </div>


                            <div class="price text-sm md:ml-5" data-cart-id="{{ $item->id }}"
                                data-base-price="{{ $item->product->price ?? 0 }}"
                                data-additional-price="{{ $item->size?->pivot->additional_price ?? 0 }}">
                                Subtotal: ${{ number_format(
            (($item->product->price ?? 0) + ($item->size?->pivot->additional_price ?? 0))
            * ($item->quantity ?? 1),
            2
        ) }}
                            </div>


                            {{-- Actions --}}
                            <div class="border py-3 px-3 border-gray-400 cart-item" data-cart-id="{{ $item->id }}">
                                {{-- Update Size --}}
                                <div class="mt-2">
                                    <label class="text-gray-600 mr-2">Size:</label>
                                    <select name="size_id" 
                                    data-cart-id="{{ $item->id }}"
                                    class="border border-gray-600 text-gray-600 rounded px-2 py-1 text-sm update-size cursor-pointer">

                                    @foreach($item->product?->sizes ?? [] as $size)
                                    @php
            $stock = $size->pivot->stock ?? 0;
            $additionalPrice = $size->pivot->additional_price ?? 0;
                                    @endphp
                                    <option value="{{ $size->id }}"
                                    data-stock="{{ $stock }}"
                                    data-additional-price="{{ $additionalPrice }}"
                                    {{ $item->size_id == $size->id ? 'selected' : '' }}
                                    {{ $stock <= 0 ? 'disabled' : '' }}>
                                    {{ $size->code }} {{ $stock <= 0 ? '(Out of Stock)' : '' }}
                                    </option>
                                    @endforeach
                                    </select>

                                </div>

                                @php
        $initialStock = $item->size?->pivot->stock ?? 0;
                                @endphp

                                {{-- Update Quantity --}}
                                <div class="mt-2 flex flex-col gap-1">
                                    <label class="text-gray-600">Quantity:</label>
                                    <div class="flex items-center justify-between">
                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 decrease-qty cursor-pointer"
                                            data-cart-id="{{ $item->id }}">
                                            <i class="fas fa-minus text-gray-600 text-xs"></i>
                                        </button>

                                        <input id="quantity" type="number" value="{{ $item->quantity ?? 1 }}" min="1" max="{{ $initialStock }}"
                                            class="w-16 h-8 text-center text-gray-600 border border-gray-300 rounded-2xl quantity-input"
                                            data-cart-id="{{ $item->id }}">

                                        <button
                                            class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 increase-qty cursor-pointer"
                                            data-cart-id="{{ $item->id }}">
                                            <i class="fas fa-plus text-gray-600 text-xs"></i>
                                        </button>
                                    </div>
                                    <span class="text-xs text-gray-500 max-label">
                                        Max: {{ $initialStock }}
                                    </span>

                                </div>

                                {{-- Delete Button --}}
                                <div class="mt-3">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="delete-form inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex gap-2 justify-center items-center text-sm cursor-pointer border rounded-sm w-full py-2 bg-black text-white hover:bg-white hover:text-black">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Total -->
                <div class="mt-6 p-4 border-t border-gray-200">
                    <div class="text-xl mb-4">
                        Total: <span id="cart-total" class="text-gray-600">
                            ${{ number_format($cartItems->sum(function ($item) {
        $qty = intval($item->quantity);
        if ($qty < 1)
            $qty = 1;
        return ($item->product->price ?? 0) * $qty;
    }), 2) }}
                        </span>
                    </div>

                    <div class="flex gap-4 mt-6 justify-between">
                        @if (Auth::check())
                            {{-- Jika sudah login → ke beranda --}}
                            <a href="{{ route('beranda') }}"
                                class="group inline-flex items-center gap-2 hover:text-black text-gray-600! px-6 py-2 border-b-white border-b-1 hover:border-b hover:border-gray-600 duration-200">

                                <svg class="w-5 h-5 transform transition-all duration-300 -translate-x-2 group-hover:translate-x-0"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>

                                Continue Shopping
                            </a>

                        @else
                            {{-- Jika belum login → ke welcome --}}
                            <a href="{{ route('welcome') }}"
                                class="group inline-flex items-center gap-2 hover:text-black text-gray-600! px-6 py-2 border-b-white border-b-1 hover:border-b hover:border-gray-600 duration-200">

                                <svg class="w-5 h-5 transform transition-all duration-300 -translate-x-2 group-hover:translate-x-0"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>

                                Continue Shopping
                            </a>
                        @endif
                        <form action="{{ route('checkout') }}" method="GET">
                            <button type="submit"
                                class="inline-block bg-black text-white px-6 py-2 rounded hover:bg-white hover:border hover:text-black focus:bg-white border-1 focus:text-black focus:border focus:border-black cursor-pointer text-sm">
                                Proceed to Checkout
                            </button>
                        </form>

                    </div>
                </div>
            @endif
        </div>

        <style>
            #quantity {
                -moz-appearance: textfield;
            }

            #quantity::-webkit-outer-spin-button,
            #quantity::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                /* =========================
                   SUBTOTAL & TOTAL
                ========================== */

                function updateSubtotal(cartId, quantity) {
                    const subtotalEl = document.querySelector(`.price[data-cart-id="${cartId}"]`);
                    if (!subtotalEl) return;

                    const base = parseFloat(subtotalEl.dataset.basePrice) || 0;
                    const additional = parseFloat(subtotalEl.dataset.additionalPrice) || 0;

                    const subtotal = (base + additional) * quantity;
                    subtotalEl.textContent = `Subtotal: $${subtotal.toFixed(2)}`;

                    updateCartTotal();
                }

                function updatePricePerItem(cartId, additional) {
                    const el = document.querySelector(`.price-per-item[data-cart-id="${cartId}"]`);
                    if (!el) return;

                    const base = parseFloat(el.dataset.basePrice) || 0;
                    el.dataset.additionalPrice = additional;
                    el.textContent = `$${(base + additional).toFixed(2)}`;
                }

                function updateCartTotal() {
                    let total = 0;

                    document.querySelectorAll('.price').forEach(el => {
                        const cartId = el.dataset.cartId;
                        const base = parseFloat(el.dataset.basePrice) || 0;
                        const additional = parseFloat(el.dataset.additionalPrice) || 0;
                        const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                        const qty = input ? parseInt(input.value) || 1 : 1;

                        total += (base + additional) * qty;
                    });

                    const totalEl = document.getElementById('cart-total');
                    if (totalEl) totalEl.textContent = `$${total.toFixed(2)}`;
                }

                /* =========================
                   UPDATE QUANTITY (CORE)
                ========================== */

                function updateQuantity(cartId, newQty) {
                    const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                    if (!input) return;

                    const max = parseInt(input.max) || 9999;

                    if (isNaN(newQty) || newQty < 1) newQty = 1;
                    if (newQty > max) newQty = max;

                    input.value = newQty;

                    updateSubtotal(cartId, newQty);

                    const decreaseBtn = document.querySelector(`.decrease-qty[data-cart-id="${cartId}"]`);
                    const increaseBtn = document.querySelector(`.increase-qty[data-cart-id="${cartId}"]`);
                    if (decreaseBtn) decreaseBtn.disabled = (newQty <= 1);
                    if (increaseBtn) increaseBtn.disabled = (newQty >= max);

                    fetch(`/cart/${cartId}/update-quantity`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ quantity: newQty })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (!data.success) {
                                alert(data.message || 'Gagal update quantity');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Terjadi kesalahan saat update quantity');
                        });
                }

                /* =========================
                   BUTTON + / -
                ========================== */

                document.querySelectorAll('.increase-qty').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const cartId = this.dataset.cartId;
                        const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                        updateQuantity(cartId, parseInt(input.value) + 1);
                    });
                });

                document.querySelectorAll('.decrease-qty').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const cartId = this.dataset.cartId;
                        const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                        updateQuantity(cartId, parseInt(input.value) - 1);
                    });
                });

                /* =========================
                   INPUT MANUAL
                ========================== */

                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function () {
                        updateQuantity(this.dataset.cartId, parseInt(this.value));
                    });

                    input.addEventListener('wheel', e => e.preventDefault());
                });

                /* =========================
                   INIT SIZE (PAGE LOAD)
                ========================== */

                document.querySelectorAll('.update-size').forEach(select => {
                    const option = select.selectedOptions[0];
                    if (!option || !option.value) return;

                    const cartId = select.dataset.cartId;
                    const stock = parseInt(option.dataset.stock) || 0;
                    const additional = parseFloat(option.dataset.additionalPrice) || 0;

                    const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                    if (!input) return;

                    const maxQty = stock > 0 ? stock : 1;
                    input.max = maxQty;
                    if (parseInt(input.value) > maxQty) input.value = maxQty;

                    const maxLabel = input.closest('.mt-2')?.querySelector('.max-label');
                    if (maxLabel) maxLabel.textContent = `Max: ${stock}`;

                    updatePricePerItem(cartId, additional);

                    const subtotalEl = document.querySelector(`.price[data-cart-id="${cartId}"]`);
                    if (subtotalEl) subtotalEl.dataset.additionalPrice = additional;

                    updateSubtotal(cartId, parseInt(input.value));

                    const decreaseBtn = document.querySelector(`.decrease-qty[data-cart-id="${cartId}"]`);
                    const increaseBtn = document.querySelector(`.increase-qty[data-cart-id="${cartId}"]`);
                    if (decreaseBtn) decreaseBtn.disabled = (input.value <= 1);
                    if (increaseBtn) increaseBtn.disabled = (input.value >= input.max);
                });

                /* =========================
                   SIZE CHANGE (USER ACTION)
                ========================== */

                document.querySelectorAll('.update-size').forEach(select => {
                    select.addEventListener('change', function () {
                        const cartId = this.dataset.cartId;
                        const option = this.selectedOptions[0];
                        if (!option) return;

                        const stock = parseInt(option.dataset.stock) || 0;
                        const additional = parseFloat(option.dataset.additionalPrice) || 0;

                        const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                        if (!input) return;

                        const maxQty = stock > 0 ? stock : 1;
                        input.max = maxQty;
                        if (parseInt(input.value) > maxQty) input.value = maxQty;

                        const maxLabel = input.closest('.mt-2')?.querySelector('.max-label');
                        if (maxLabel) maxLabel.textContent = `Max: ${stock}`;

                        updatePricePerItem(cartId, additional);

                        const subtotalEl = document.querySelector(`.price[data-cart-id="${cartId}"]`);
                        if (subtotalEl) subtotalEl.dataset.additionalPrice = additional;

                        updateSubtotal(cartId, parseInt(input.value));

                        const decreaseBtn = document.querySelector(`.decrease-qty[data-cart-id="${cartId}"]`);
                        const increaseBtn = document.querySelector(`.increase-qty[data-cart-id="${cartId}"]`);
                        if (decreaseBtn) decreaseBtn.disabled = (input.value <= 1);
                        if (increaseBtn) increaseBtn.disabled = (input.value >= input.max);

                        fetch(`/cart/${cartId}/update-size`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                size_id: option.value,
                                quantity: parseInt(input.value)
                            })

                        })
                            .then(res => res.json())
                            .then(data => {
                                if (!data.success) {
                                    alert(data.message || 'Gagal update size');
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('Terjadi kesalahan saat update size');
                            });
                    });
                });

                /* =========================
                   INIT TOTAL
                ========================== */
                updateCartTotal();

            });
        </script>
@endsection