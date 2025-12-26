@php
    $orderStats = [
        ['label' => 'today', 'count' => $todayOrders, 'revenue' => $todayRevenue],
        ['label' => 'yesterday', 'count' => $yesterdayOrders, 'revenue' => $yesterdayRevenue],
        ['label' => 'last week', 'count' => $lastWeekOrders, 'revenue' => $lastWeekRevenue],
        ['label' => 'last month', 'count' => $lastMonthOrders, 'revenue' => $lastMonthRevenue],
        ['label' => 'last 90-days', 'count' => $last90DaysOrders, 'revenue' => $last90DaysRevenue, 'colspan' => 'lg:col-span-2'],
    ];
@endphp

<div class="grid grid-cols-5 gap-5 mt-5 lg:grid-cols-2">
    @foreach($orderStats as $stat)
        <div class="card col-span-1 {{ $stat['colspan'] ?? '' }}">
            <div class="card-body">
                <h5 class="uppercase text-xs tracking-wider font-extrabold">{{ $stat['label'] }}</h5>
                <h1 class="capitalize text-lg mt-1 mb-1">
                    <span class="text-indigo-600 font-bold">{{ $stat['count'] }}</span>
                    <span class="text-xs tracking-widest font-extrabold ml-1">orders</span>
                </h1>
                <h2 class="capitalize text-sm text-gray-700 mt-1">
                    <span class="text-green-600 font-bold">${{ number_format($stat['revenue'], 2) }}</span>
                </h2>
            </div>
        </div>
    @endforeach
</div>