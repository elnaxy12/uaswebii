@extends('v_user.v_order.app')

@section('content-order')
    <div class="md:pt-[14rem] pt-4 px-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 container">
        <h1 class="text-2xl font-bold mb-6">My Orders</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">Order ID</th>
                        <th class="p-2 border">Total Price</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Date</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="text-center border">
                            <td class="p-2 border">{{ $order->id }}</td>
                            <td class="p-2 border">${{ number_format($order->total_price, 2) }}</td>
                            <td class="p-2 border capitalize">{{ $order->status }}</td>
                            <td class="p-2 border">{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td class="p-2 border flex justify-center gap-2">
                                <a href="{{ route('order.show', $order->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</a>

                                @if($order->status === 'pending')
                                    <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                            onclick="return confirm('Are you sure to cancel this order?')">Cancel</button>
                                    </form>
                                @endif  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection