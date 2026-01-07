@include('base2.start')
<title>Tab Checkout | Adidas</title>
</head>

<body>
    <div class="container mx-auto p-6">
        <form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
            @csrf

            <h1 class="text-2xl font-semibold open-sans mb-6">Tab Checkout</h1>

            {{-- Alert --}}
            @if(session('error'))
                <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Cart Items --}}
            <table class="min-w-full mb-6 ">
                <thead>
                    <tr class="bg-black text-white">
                        <th class="p-2 border">Product</th>
                        <th class="p-2 border">Size</th>
                        <th class="p-2 border">Price</th>
                        <th class="p-2 border">Quantity</th>
                        <th class="p-2 border">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $price = $item->product->price ?? 0;
                            $additional = $item->additional_price ?? 0;
                            $qty = $item->quantity ?? 0;
                            $subtotal = ($price + $additional) * $qty;
                            $total += $subtotal;
                        @endphp

                        <tr class="text-center">
                            <td class="p-2">{{ $item->product->name }}</td>
                            <td class="p-2">{{ $item->size->code ?? '-' }}</td>
                            <td class="p-2">${{ number_format($price + $additional, 2) }}</td>
                            <td class="p-2">{{ $qty }}</td>
                            <td class="p-2">${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right text-xl font-semibold mb-6">
                Total: ${{ number_format($total, 2) }}
            </div>

            {{-- Customer & Payment Form --}}
            <h2 class="text-xl font-bold mt-8 mb-4">Customer Information</h2>

            <div class="grid grid-cols-2 gap-4 select-none">
                <div>
                    <label class="block mb-1 font-semibold">First Name</label>
                    <input type="text" name="first_name" value="{{ auth()->user()->first_name }}"
                        class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Last Name</label>
                    <input type="text" name="last_name" value="{{ auth()->user()->last_name }}"
                        class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                </div>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}"
                    class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Phone</label>
                <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                    class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Address</label>
                <textarea name="address" rows="3" class="px-3 py-2 w-full outline-none border-b-black border-b-1"
                    required readonly>{{ auth()->user()->address }}</textarea>
            </div>

            <h2 class="text-xl font-bold mt-8 mb-4">Payment Method</h2>

            <label class="block mb-1 font-semibold">Choose Payment Method:</label>
            <select name="payment_method" class="border px-3 py-2 rounded w-full outline-none" required>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cod">Cash on Delivery (COD)</option>
                <option value="ewallet">E-Wallet</option>
            </select>

            <button type="submit" onclick="this.disabled=true; this.form.submit();"
                class="inline-block border bg-black text-white px-6 py-2 rounded hover:bg-white hover:border-black hover:text-black cursor-pointer text-sm focus:bg-white focus:border-black focus:text-black">
                Confirm & Place Order
            </button>
        </form>
    </div>
    <script>
        window.addEventListener('beforeunload', function () {
            fetch('{{ route("buy.now.cancel") }}', {
                method: 'GET',
                credentials: 'same-origin'
            });
        });
    </script>

</body>

</html>