@extends('v_user.v_order.app')

@section('content-order')
    <div class="md:pt-[14rem] pt-4 px-5 container">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <h1 class="text-2xl font-bold mb-6">My Orders</h1>
            <table class="min-w-full ">
                <thead>
                    <tr class="bg-black text-white">
                        <th class="p-2 ">Order ID</th>
                        <th class="p-2 ">Total Price</th>
                        <th class="p-2 ">Status</th>
                        <th class="p-2 ">Date</th>
                        <th class="p-2 ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="text-center border-b-gray-200 border-b-1">
                            <td class="p-2 ">{{ $order->id }}</td>
                            <td class="p-2 ">${{ number_format($order->total, 2) }}</td>
                            <td class="p-2  capitalize">{{ $order->status }}</td>
                            <td class="p-2 ">{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td class="p-2 flex justify-center gap-2">
                                <a href="{{ route('order.show', $order->id) }}"
                                    class="bg-black text-white! text-sm px-6 py-3 border-white border-1 hover:bg-white hover:text-black! hover:border-black focus:bg-white focus:text-black! focus:border-black">Detail</a>

                                @if($order->status === 'pending')
                                    <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-black text-white text-sm px-6 py-3 border-white border-1 hover:bg-red-100 hover:text-red-500 hover:border-black focus:bg-red-100 focus:text-red-500 focus:border-black cursor-pointer">Cancel</button>
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