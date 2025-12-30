<div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">

    <!-- right -->
    <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">

        <!-- top -->
        <div class="p-5 flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">Order Summary</h2>
            <div class="flex flex-row justify-center items-center">
                <a href="#" id="monthBtn" class="btn-shadow mr-4 text-sm py-2 block">month</a>
                <a href="#" id="weekBtn" class="btn-shadow text-sm py-2 block">week</a>
            </div>
        </div>
        <!-- end top -->

        <!-- chart -->
        <div id="SummaryChart"></div>
        <!-- end chart -->

    </div>
    <!-- end right -->

    <!-- left -->
    <div class="w-1/3 lg:w-full">

        <!-- top -->
        <div class="p-5 border-b border-gray-200">
            <h2 class="font-bold text-lg mb-6">Sales History</h2>

            @forelse($salesHistory as $item)
                <div class="flex flex-row justify-between mb-3">
                    <div>
                        <h4 class="text-gray-600 font-thin text-sm">
                            {{ $item->product->name ?? '-' }}
                        </h4>
                        <p class="text-gray-400 text-xs font-hairline">
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="text-sm font-medium text-green-500 truncate" title="{{ number_format($item->price) }}">
                        + ${{ number_format($item->price * $item->quantity, 2) }}
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400">No sales yet</p>
            @endforelse
        </div>

        <!-- end top -->

        <!-- bottom -->
        <div class="p-5">
            <h2 class="font-bold text-lg mb-2">Sales Progress</h2>
        
            <strong class="text-teal-400 font-extrabold text-xl">
                {{ number_format($totalSold) }} Products Sold
            </strong>
        
            <p class="text-xs text-gray-500 mt-1">
                Total Sales: ${{ number_format($salesValue, 0, ',', '.') }}
            </p>
        
            <div class="bg-gray-300 h-2 rounded-full mt-2 overflow-hidden">
                <div class="h-full rounded-full bg-teal-400 transition-all duration-500" style="width: {{ $inventoryProgress }}%">
                </div>
            </div>
        </div>

        <!-- end bottom -->

    </div>
    <!-- end left -->

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthData = {
            orders: @json($orderTotals),
            items: @json($itemTotals),
            dates: @json($dates)
        };
        const weekData = {
            orders: @json($weekOrderTotals ?? []),
            items: @json($weekItemTotals ?? []),
            dates: @json($weekDates ?? [])
        };

        var chart = new ApexCharts(document.querySelector("#SummaryChart"), {
            chart: { type: 'area', height: 300, toolbar: { show: false } },
            series: [
                { name: 'Orders', data: monthData.orders },
                { name: 'Items', data: monthData.items }
            ],
            colors: ['#4fd1c5'],
            xaxis: { categories: monthData.dates, labels: { show: true } },
            stroke: { width: 3 },
            fill: { opacity: 0.7 },
            legend: { position: 'top' },
            yaxis: { show: true }
        });

        chart.render();

        function updateChart(data) {
            chart.updateOptions({
                series: [
                    { name: 'Orders', data: data.orders },
                    { name: 'Items', data: data.items }
                ],
                xaxis: { categories: data.dates }
            });
        }

        function setActiveButton(activeBtn, inactiveBtn) {
            activeBtn.classList.remove('btn-shadow');
            activeBtn.classList.add('btn');

            inactiveBtn.classList.remove('btn');
            inactiveBtn.classList.add('btn-shadow');
        }

        const monthBtn = document.getElementById('monthBtn');
        const weekBtn = document.getElementById('weekBtn');

        monthBtn.addEventListener('click', function (e) {
            e.preventDefault();
            updateChart(monthData);
            setActiveButton(monthBtn, weekBtn);
        });

        weekBtn.addEventListener('click', function (e) {
            e.preventDefault();
            updateChart(weekData);
            setActiveButton(weekBtn, monthBtn);
        });
    });
</script>