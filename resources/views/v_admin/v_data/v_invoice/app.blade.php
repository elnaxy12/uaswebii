@include('base.start')
@include('base.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexch arts.css">
    <!-- Styles lainnya -->
    @stack('styles')
</head>

<body>
    <!-- strat wrapper -->
    <div class="flex bg-white">
        @include('base.sidebar')
        <div class="p-6 h-screen w-full overflow-y-auto">
            <h1 class="text-xl font-semibold mb-6">Data Invoice</h1>
            <div class="grid grid-cols-3 gap-4">
                @forelse($orders as $order)
                    <div x-data="{ open: false }" class="bg-white my-3">
                        {{-- HEADER --}}
                        <div class="p-4 flex justify-between border rounded-lg shadow-2xs items-center cursor-pointer bg-gray-50"
                            @click="open = !open">
                            <div>
                                <span class="font-semibold">{{ $order->invoice_number }}</span>
                                <p class="text-xs text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded
                                @if($order->status == 'waiting_payment') bg-yellow-100 text-yellow-700
                                @elseif($order->status == 'paid') bg-green-100 text-green-700
                                @elseif($order->status == 'canceled') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ strtoupper(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </div>

                        {{-- DETAIL TERSEMBUNYI --}}
                        <div x-show="open" x-transition class="p-4 text-sm text-gray-700 space-y-4">
                            {{-- CUSTOMER INFO --}}
                            <div class="text-sm">
                                <h3 class="font-medium mb-2">Customer</h3>

                                <div class="grid grid-cols-2 gap-x-2 gap-y-1">
                                    <div class="font-medium">Name</div>
                                    <div>:
                                        {{ trim(($order->user->first_name ?? '') . ' ' . ($order->user->last_name ?? '')) ?: '-' }}
                                    </div>

                                    <div class="font-medium">Email</div>
                                    <div>: {{ $order->user->email ?? '-' }}</div>

                                    <div class="font-medium">Address</div>
                                    <div class="truncate">: {{ $order->user->address ?? '-' }}</div>
                                </div>
                            </div>


                            {{-- INVOICE INFO --}}
                            <div class="grid grid-cols-2 gap-x-2 gap-y-1 text-sm">
                                <div class="font-medium">Invoice Number</div>
                                <div>: {{ $order->invoice_number }}</div>

                                <div class="font-medium">Status</div>
                                <div>
                                    :
                                    <span class="
                                            @if($order->status == 'pending') text-yellow-700
                                            @elseif($order->status == 'waiting_payment') text-orange-700
                                            @elseif($order->status == 'paid') text-green-700
                                            @elseif($order->status == 'canceled') text-red-700
                                            @else text-gray-600 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                    </span>
                                </div>

                                <div class="font-medium">Payment Method</div>
                                <div>: {{ $order->payment->payment_method ?? '-' }}</div>

                                @if($order->tracking_number)
                                    <div class="font-medium">Tracking Number</div>
                                    <div>: {{ $order->tracking_number }}</div>
                                @endif

                                @if($order->shipping_service)
                                    <div class="font-medium">Shipping Service</div>
                                    <div>: {{ $order->shipping_service }}</div>
                                @endif
                            </div>


                            {{-- ORDER ITEMS --}}
                            <div>
                                <h3 class="font-medium mb-2">Order Items</h3>
                                <table class="w-full text-xs border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="border px-2 py-1 text-left">Product</th>
                                            <th class="border px-2 py-1 text-center">Size</th>
                                            <th class="border px-2 py-1 text-center">Qty</th>
                                            <th class="border px-2 py-1 text-right">Price</th>
                                            <th class="border px-2 py-1 text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td class="border px-2 py-1">{{ $item->product->name ?? '-' }}</td>
                                                <td class="border px-2 py-1 text-center">{{ $item->size->code ?? '-' }}</td>
                                                <td class="border px-2 py-1 text-center">{{ $item->quantity }}</td>
                                                <td class="border px-2 py-1 text-right">${{ number_format($item->price) }}</td>
                                                <td class="border px-2 py-1 text-right">
                                                    ${{ number_format($item->price * $item->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- TOTAL --}}
                            <div class="text-right font-medium">
                                <div>Total : ${{ number_format($order->total) }}</div>
                            </div>

                            {{-- NOTES --}}
                            @if($order->notes)
                                <div>
                                    <strong>Notes:</strong> {{ $order->notes }}
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada invoice</p>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </div>
</body>