<div class="card">

    <div class="card-body">
        <h1 class="font-extrabold text-lg">Recent Orders</h1>

        <!-- start a table -->
        <table class="table-fixed w-full mt-5">

            <!-- table head -->
            <thead class="text-left">
                <tr>
                    <th class="py-4 px-2 text-sm font-extrabold tracking-wide">Customer</th>
                    <th class="py-4 px-2 text-sm font-extrabold tracking-wide">Product</th>
                    <th class="py-4 px-2 text-sm font-extrabold tracking-wide">Invoice</th>
                    <th class="py-4 px-2 text-sm font-extrabold tracking-wide">Price</th>
                    <th class="py-4 px-2 text-sm font-extrabold tracking-wide">Status</th>
                </tr>
            </thead>

            <!-- table body -->
            <tbody class="text-left text-gray-600">
                @php $count = 0; @endphp

                @foreach ($orders as $order)
                    @foreach ($order->items as $item)
                        @break($count >= 4)
                        <tr>
                            <!-- customer -->
                            <td class="py-3 text-xs font-semibold flex items-center gap-3">
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                    class="w-20 object-cover">
                            </td>

                            <!-- product -->
                            <td class="text-xs font-semibold">
                                {{ $item->product->name }}
                            </td>

                            <!-- invoice -->
                            <td class="px-4 text-xs font-semibold ">
                                #{{ $order->id }}
                            </td>

                            <!-- price -->
                            <td class="text-xs font-semibold">
                                ${{ number_format($order->total, 0, ',', '.') }}
                            </td>

                            <!-- status -->
                            <td class="text-xs font-semibold capitalize">
                                {{ $order->status }}
                            </td>

                        </tr>
                        @php $count++; @endphp
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <!-- end a table -->
    </div>
</div>