<div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">

    <!-- right -->
    <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">

        <!-- top -->
        <div class="p-5 flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">Order Summary</h2>
            <div class="flex flex-row justify-center items-center">
                <a href="#" class="btn mr-4 text-sm py-2 block">month</a>
                <a href="#" class="btn-shadow text-sm py-2 block">week</a>
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
            <strong class="text-teal-400 font-extrabold text-xl">$82,950.96</strong>

            <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
            </div>
        </div>
        <!-- end bottom -->

    </div>
    <!-- end left -->

</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                chart: {
                    width: '100%',
                    type: "area",
                    toolbar: {
                        show: false,
                    },
                },
                grid: {
                    show: false,
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false,
                },
                series: [
                    {
                        name: "serie1",
                        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                    },
                    {
                        name: "serie2",
                        data: [54, 45, 51, 57, 32, 33, 31, 31, 46, 37, 33]
                    }
                ],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.9,
                        opacityTo: 0.7,
                        stops: [0, 90, 100]
                    },
                    colors: ['#4fd1c5'],
                },
                stroke: {
                    colors: ['#4fd1c5'],
                    width: 3
                },
                yaxis: {
                    show: false,
                },
                xaxis: {
                    categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    tooltip: {
                        enabled: false,
                    }
                },
            };

            var SummaryChart = document.getElementById("SummaryChart");

            if (SummaryChart != null && typeof (SummaryChart) != 'undefined' && typeof ApexCharts !== 'undefined') {
                var chart = new ApexCharts(SummaryChart, options);
                chart.render();
            }
        });
    </script>
@endpush