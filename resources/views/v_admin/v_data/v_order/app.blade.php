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
    </div>
</body>