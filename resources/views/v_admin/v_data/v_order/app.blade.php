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
    <div class="flex h-screen">
        @include('base.sidebar')
        <div class="bg-white rounded-xl w-full">
            <h2 class="text-sm font-bold mb-4 p-5">
                Orders
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-500 border-b text-left">
                        <tr>
                            <th class="p-3">Order ID</th>
                            <th class="p-3">Customer ID</th>
                            <th class="p-3">Total</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Payment Method</th>
                            <th class="p-3">Date</th>
                            <th class="p-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="border-b">
                                <td class="p-3">#{{ $order->id }}</td>
                                <td class="p-3">{{ $order->user_id}}</td>
                                <td class="p-3">${{ number_format($order->total, 0, ',', '.') }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded text-xs
                                                @if($order->status == 'pending') bg-yellow-100 text-yellow-600
                                                @elseif($order->status == 'shipped') bg-blue-100 text-blue-600
                                                @elseif($order->status == 'delivered') bg-green-100 text-green-600
                                                @else bg-red-100 text-red-600 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-xs">
                                    {{ strtoupper($order->payment->payment_method ?? '-') }}
                                </td>
                                <td class="p-3">{{ $order->created_at->format('d M Y') }}</td>
                                <td class="p-3 text-center">

                                    {{-- CANCELED (GLOBAL - READ ONLY) --}}
                                    @if ($order->status === 'canceled')
                                        <span class="text-xs text-red-600 font-semibold">Canceled</span>

                                        {{-- COD --}}
                                    @elseif ($order->payment?->payment_method === 'cod')

                                        @if ($order->status === 'pending')
                                            <button onclick="openShippingModal({{ $order->id }})"
                                                class="bg-purple-600 text-white text-xs px-3 py-2 rounded w-full">
                                                Mark as Shipped
                                            </button>

                                        @elseif ($order->status === 'shipped')
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="delivered">
                                                <button class="bg-green-600 text-white text-xs px-3 py-1 rounded">
                                                    Confirm Delivered
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400">{{ ucfirst($order->status) }}</span>
                                        @endif

                                        {{-- E-WALLET --}}
                                    @elseif ($order->payment?->payment_method === 'ewallet')

                                        @if ($order->status === 'pending')
                                            <button onclick="openShippingModal({{ $order->id }})"
                                                class="bg-purple-600 text-white text-xs px-3 py-2 rounded w-full">
                                                Mark as Shipped </button>

                                        @elseif ($order->status === 'shipped')
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="delivered">
                                                <button class="bg-green-600 text-white text-xs px-3 py-1 rounded">
                                                    Confirm Delivered
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400">{{ ucfirst($order->status) }}</span>
                                        @endif

                                        {{-- TRANSFER / VA --}}
                                    @else

                                        @if ($order->status === 'pending')
                                            <form action="{{ route('admin.orders.sendPaymentEmail', $order->id) }}" method="POST">
                                                @csrf
                                                <button class="bg-blue-600 text-white text-xs px-3 py-2 rounded w-full">
                                                    Send Payment Email
                                                </button>
                                            </form>
 
                                        @elseif ($order->status === 'waiting_payment')
                                            <span class="text-xs text-gray-400">Waiting Payment</span>
                                        @endif

                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">No orders yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="shippingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
                    <div class="bg-white p-4 rounded w-96 mx-auto mt-20">
                        <form method="POST" id="shippingForm">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="status" value="shipped">
                            <input name="shipping_service" placeholder="Kurir" required
                                class="w-full mb-2 border p-2 outline-none">
                            <input name="tracking_number" placeholder="No Resi" required
                                class="w-full mb-2 border p-2 outline-none">
                            <input type="date" name="shipped_at" required
                                class="w-full mb-2 border p-2 outline-none">
                            <input type="date" name="estimated_arrival" required
                                class="w-full mb-2 border p-2 outline-none">

                            <div class="flex justify-between">
                                <button class="text-sm py-1 px-2" type="button" onclick="closeShippingModal()">Cancel</button>
                                <button class="bg-purple-600 text-white px-3 py-1 rounded text-sm">
                                    Confirm Shipped
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function openShippingModal(orderId) {
                        const form = document.getElementById('shippingForm');
                        form.action = `/admin/order/${orderId}/status`;
                        document.getElementById('shippingModal').classList.remove('hidden');
                    }

                    function closeShippingModal() {
                        document.getElementById('shippingModal').classList.add('hidden');
                    }
                </script>
            </div>
        </div>
    </div>
</body>