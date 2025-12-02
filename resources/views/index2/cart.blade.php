@extends('v_user.v_cart.app')

@section('content')
    <div class="md:pt-[14rem] pt-4 pl-5 flex flex-col gap-2 md:w-5xl w-full">
        <h2 class="text-2xl font-semibold mb-4">Shopping Cart</h2>


        @if ($cartItems->isEmpty())
            <p class="text-gray-500">cart is still empty</p>
        @else
            <div class="hidden md:grid grid-cols-4 w-full gap-4 items-center text-center">
                <p>Name</p>
                <p>Price</p>
                <p>Total Price</p>
                <p>Action</p>
            </div>
            @foreach ($cartItems as $item)
                <div class="flex md:flex-row flex-col gap-4 mb-4 p-4 items-center" id="cart-item-{{ $item->id }}">
                    @if($item->product && $item->product->image)
                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                            class="md:w-20 md:h-20 w-40 h-40 object-cover rounded">
                    @else
                        <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif

                    <div class="grid md:grid-cols-4 grid-cols-1 w-full gap-4 items-center">
                        <div class="text-2xl">
                            {{ $item->product->name ?? 'Product Not Found' }}
                        </div>

                        <div class="text-sm">
                            ${{ number_format($item->product->price ?? 0, 2) }}
                        </div>

                        <!-- Subtotal -->
                        <div class="text-sm">
                            Subtotal: $<span class="subtotal" data-cart-id="{{ $item->id }}">
                                {{ number_format(($item->product->price ?? 0) * $item->quantity, 2) }}
                            </span>
                        </div>

                        <div class="border py-3 px-3 border-gray-400">
                            <!-- Update Size -->
                            <div class="mt-2">
                                <label class="text-gray-600 mr-2">Size:</label>
                                <select name="size_id" data-cart-id="{{ $item->id }}"
                                    class="border border-gray-600 text-gray-600 rounded px-2 py-1 text-sm update-size cursor-pointer">
                                    <option value="">Select Size</option>
                                    @foreach($item->product->sizes ?? [] as $size)
                                        @php
                                            $stock = $size->pivot->stock ?? 0;
                                            $isAvailable = $stock > 0;
                                        @endphp
                                        <option value="{{ $size->id }}" {{ $item->size_id == $size->id ? 'selected' : '' }} {{ !$isAvailable ? 'disabled' : '' }}>
                                            {{ $size->code }} {{ !$isAvailable ? '(Out of Stock)' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Update Quantity -->
                            <div class="mt-2 flex flex-col gap-1">
                                <label class="text-gray-600">Quantity:</label>
                                <div class="flex items-center justify-between">
                                    <button
                                        class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 decrease-qty cursor-pointer"
                                        data-cart-id="{{ $item->id }}">
                                        <i class="fas fa-minus text-gray-600 text-xs"></i>
                                    </button>

                                    <input type="number" value="{{ $item->quantity }}" min="1"
                                        max="{{ $item->size->pivot->stock ?? 10 }}"
                                        class="w-16 h-8 text-center text-gray-600 border border-gray-300 rounded-2xl quantity-input"
                                        data-cart-id="{{ $item->id }}" readonly>

                                    <button
                                        class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 increase-qty cursor-pointer"
                                        data-cart-id="{{ $item->id }}">
                                        <i class="fas fa-plus text-gray-600 text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-xs text-gray-500">
                                    Max: {{ $item->size->pivot->stock ?? 10 }}
                                </span>
                            </div>
                            <!-- Delete Button -->
                            <div class="mt-3">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="delete-form inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex gap-2 justify-center items-center text-sm cursor-pointer border rounded-sm w-full py-2 bg-black text-white hover:bg-white hover:text-black hover:border">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                            <path d="M3 6h18" />
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Total -->
            <div class="mt-6 p-4 border-t">
                <div class="text-xl font-bold mb-4">
                    Total: $<span id="cart-total">
                        {{ number_format($cartItems->sum(function ($item) {
                return ($item->product->price ?? 0) * $item->quantity;
            }), 2) }}
                    </span>
                </div>

                <div class="flex gap-4">
                    <a href="{{ url('/') }}" class="inline-block bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300">
                        Continue Shopping
                    </a>
                    {{-- <a href="{{ route('checkout') }}"
                        class="inline-block bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
                        Proceed to Checkout
                    </a> --}}
                </div>
            </div>
        @endif
    </div>

    <!-- JavaScript untuk Update -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Update Quantity
            document.querySelectorAll('.increase-qty').forEach(button => {
                button.addEventListener('click', function () {
                    const cartId = this.getAttribute('data-cart-id');
                    updateQuantity(cartId, 'increase');
                });
            });

            document.querySelectorAll('.decrease-qty').forEach(button => {
                button.addEventListener('click', function () {
                    const cartId = this.getAttribute('data-cart-id');
                    updateQuantity(cartId, 'decrease');
                });
            });

            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function () {
                    const cartId = this.getAttribute('data-cart-id');
                    const newQuantity = parseInt(this.value);
                    if (!isNaN(newQuantity) && newQuantity > 0) {
                        updateQuantityAjax(cartId, newQuantity);
                    }
                });
            });

            // Update Size
            document.querySelectorAll('.update-size').forEach(select => {
                select.addEventListener('change', function () {
                    const cartId = this.getAttribute('data-cart-id');
                    const newSizeId = this.value;
                    if (newSizeId) {
                        updateSizeAjax(cartId, newSizeId);
                    }
                });
            });

            // Delete Confirmation
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    // if (!confirm('Are you sure you want to remove this item from cart?')) {
                    //     e.preventDefault();
                    // }
                });
            });

            // Functions
            function updateQuantity(cartId, action) {
                const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                let currentQty = parseInt(input.value);
                const maxQty = parseInt(input.max);

                if (action === 'increase' && currentQty < maxQty) {
                    currentQty++;
                } else if (action === 'decrease' && currentQty > 1) {
                    currentQty--;
                }

                input.value = currentQty;
                updateQuantityAjax(cartId, currentQty);
            }

            function updateQuantityAjax(cartId, quantity) {
                fetch(`/cart/${cartId}/update-quantity`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ quantity: quantity })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update subtotal
                            const price = parseFloat(data.price);
                            const subtotal = price * quantity;
                            document.querySelector(`.subtotal[data-cart-id="${cartId}"]`).textContent = subtotal.toFixed(2);

                            // Update total
                            updateTotal();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            function updateSizeAjax(cartId, sizeId) {
                fetch(`/cart/${cartId}/update-size`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ size_id: sizeId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update max quantity
                            const input = document.querySelector(`.quantity-input[data-cart-id="${cartId}"]`);
                            input.max = data.max_quantity;

                            // Adjust current quantity if exceeds max
                            if (parseInt(input.value) > data.max_quantity) {
                                input.value = data.max_quantity;
                                updateQuantityAjax(cartId, data.max_quantity);
                            }

                            // Show success message
                            // alert('Size updated successfully!');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.subtotal').forEach(element => {
                    total += parseFloat(element.textContent);
                });
                document.getElementById('cart-total').textContent = total.toFixed(2);
            }
        });
    </script>
@endsection