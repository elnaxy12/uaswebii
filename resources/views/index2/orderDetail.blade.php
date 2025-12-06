<div class="md:pt-[10rem] pt-4 px-5 container space-y-5">
    <a href="{{ route('user.order') }}"
        class="group inline-flex items-center gap-2 hover:text-black text-gray-600! px-6 py-2 border-b-white border-b-1 hover:border-b hover:border-gray-600 duration-200">
        <svg class="w-5 h-5 transform transition-all duration-300 -translate-x-2 group-hover:translate-x-0" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Orders
    </a>
    <div class="max-w-4xl mx-auto space-y-6">
        {{-- <!-- User Details -->
        <div class="bg-gray-100 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">User Details</h2>
            <div class="grid grid-cols-2 gap-4 select-none">
                <div>
                    <label class="block mb-1 font-semibold">First Name</label>
                    <input type="text" value="{{ auth()->user()->first_name }}" class="px-3 py-2 w-full outline-none "
                        readonly>
                </div>
                <div>
                    <label class="block mb-1 font-semibold">Last Name</label>
                    <input type="text" value="{{ auth()->user()->last_name }}" class="px-3 py-2 w-full outline-none "
                        readonly>
                </div>
            </div>
            <div class="mt-4 space-y-4">
                <div>
                    <label class="block mb-1 font-semibold">Email</label>
                    <input type="email" value="{{ auth()->user()->email }}" class="px-3 py-2 w-full outline-none "
                        readonly>
                </div>
                <div>
                    <label class="block mb-1 font-semibold">Phone</label>
                    <input type="text" value="{{ auth()->user()->phone }}" class="px-3 py-2 w-full outline-none "
                        readonly>
                </div>
                <div>
                    <label class="block mb-1 font-semibold">Address</label>
                    <textarea rows="3" class="px-3 py-2 w-full outline-none "
                        readonly>{{ auth()->user()->address }}</textarea>
                </div>
            </div>
        </div> --}}

        <!-- Order & Payment Details -->
        <div class="bg-gray-100 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Order #{{ $order->id }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                <div><span class="font-semibold">Status:</span> <span class="capitalize">{{ $order->status }}</span>
                </div>
                <div><span class="font-semibold">Date:</span> {{ $order->created_at->format('d M Y H:i') }}</div>
                <div><span class="font-semibold">Total Price:</span> ${{ number_format($order->total, 2) }}</div>
                @if(!empty($order->payment))
                    <div><span class="font-semibold">Payment:</span> {{ $order->payment->payment_method }}</div>
                @endif
            </div>
        </div>

        <!-- Order Items -->
        <div class="overflow-x-auto bg-white p-4 rounded-lg shadow space-y-6">
            <table class="w-full min-w-[500px] border-collapse">
                <thead class="bg-black text-white text-sm">
                    <tr>
                        <th class="p-2 text-left">Product</th>
                        <th class="p-2 text-left">Price</th>
                        <th class="p-2 text-left">Quantity</th>
                        <th class="p-2 text-left">Subtotal</th>
                    </tr>
                </thead>

                <tbody class="text-sm">
                    @foreach($order->items as $item)
                        <tr class="border-b border-gray-200">
                            <td class="p-2 flex items-center gap-2">
                                @if($item->product && $item->product->image)
                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                        class="w-50 h-50 object-cover">
                                @endif
                                {{ $item->product->name }}
                                <span class="text-xs text-gray-500">
                                    ({{ $item->size->code ?? '-' }})
                                </span>
                            </td>
                            <td class="p-2">${{ number_format($item->price, 2) }}</td>
                            <td class="p-2">{{ $item->quantity }}</td>
                            <td class="p-2">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="w-full min-w-[500px] border-collapse">
                <thead class="bg-black text-white text-sm">
                    <tr>
                        <th class="p-2 text-left">First Name</th>
                        <th class="p-2 text-left">Last Name</th>
                        <th class="p-2 text-left">Email</th>
                        <th class="p-2 text-left">Phone</th>
                        <th class="p-2 text-left">Address</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-200 text-xs">
                        <td class="p-2">
                            <input type="text" value="{{ auth()->user()->first_name }}"
                                class="px-3 py-2 w-full outline-none" readonly>
                        </td>
                        <td class="p-2"><input type="text" value="{{ auth()->user()->last_name }}"
                                class="px-3 py-2 w-full outline-none" readonly>
                        </td>
                        <td class="p-2"><input type="email" value="{{ auth()->user()->email }}"
                                class="px-3 py-2 w-full outline-none" readonly>
                        </td>
                        <td class="p-2"><input type="text" value="{{ auth()->user()->phone }}"
                                class="px-3 py-2 w-full outline-none" readonly>
                        </td>
                        <td class="p-2">
                            <textarea rows="3" class="px-3 py-2 w-full outline-none "
                                readonly>{{ auth()->user()->address }}</textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Actions -->
        <div class="flex flex-col md:flex-row gap-2 py-5 justify-end">
            @if($order->status === 'pending')
                <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-black text-white text-sm px-6 py-2 border-white border-1 hover:bg-red-100 hover:text-red-500 hover:border-black focus:bg-red-100 focus:text-red-500 focus:border-black cursor-pointer">
                        Cancel Order
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>