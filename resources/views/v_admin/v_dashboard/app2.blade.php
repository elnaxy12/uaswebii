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
    <div class="h-screen flex flex-row flex-wrap">

        @include('base.sidebar')

        <!-- strat content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">

            <!-- congrats & summary -->
            <div class="grid grid-cols-3 lg:grid-cols-1 gap-5">
                @include('index.congrats')
                @include('index.summary')
            </div>
            <!-- end congrats & summary -->

            <!-- status -->
            @include('index.status')
            <!-- end status -->

            <!-- best seller & traffic -->
            <div class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-5">
                @include('index.bestSeller')
                @include('index.recent_order')
            </div>
            <!-- end best seller & traffic -->


        </div>
        <!-- end content -->

    </div>
    <!-- end wrapper -->
    @yield('content')

    <!-- Load ApexCharts JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Scripts lainnya -->
    @stack('scripts')
</body>

</html>

@include('base.end')