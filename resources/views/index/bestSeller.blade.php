<div class="card">

    <div class="card-body">
        <div class="flex flex-row justify-between items-center">
            <h1 class="font-extrabold text-lg">best sellers</h1>
        </div>

        <table class="table-auto w-full mt-5 text-right">
            <thead>
                <tr>
                    <th class="py-4 px-2 font-extrabold text-sm text-left">Product</th>
                    <th class="py-4 px-5 font-extrabold text-sm">Price</th>
                    <th class="py-4 px-5 font-extrabold text-sm">Sold</th>
                    <th class="py-4 px-5 font-extrabold text-sm">Profit</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bestSellers->sortByDesc('total_sold')->take(4) as $item)
                    <tr>
                        <!-- Product -->
                        <td class="py-3 text-left flex items-center gap-3">
                            <img src="{{ $item->product->image }}" class="object-cover w-20">
                            <span class="text-xs">{{ $item->product->name }}</span>
                        </td>

                        <!-- Price -->
                        <td class="py-4 px-5">
                            ${{ number_format($item->product->price, 0, ',', '.') }}
                        </td>

                        <!-- Sold -->
                        <td class="py-4 px-5">
                            {{ $item->total_sold }}
                        </td>

                        <!-- Profit -->
                        <td class="py-4 px-5 font-semibold">
                            ${{ number_format($item->total_sold * $item->product->price, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>