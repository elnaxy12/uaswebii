@include('base2.start')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexch arts.css">
    <title>Tab Payment | Adidas</title>
    <!-- Styles lainnya -->
    @stack('styles')
</head>

<body>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            @include('base2.navbar')
            <div class="relative min-h-screen">
                <div class="w-xs border absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-8 py-8 w-xl">
                    <div class="fixed hidden md:block top-0 right-0 -z-10">
                        <img src="https://preview.thenewsmarket.com/Previews/ADID/StillAssets/1920x1440/689347.jpg" width="50">
                    </div>
                    <h2 class="text-xl font-bold mb-4 text-center">Scan QR for Payment</h2>
                    <div class="grid grid-cols-3">
                        <p>Order ID</p>
                        <p>:</p>
                        <p class="text-right">#{{ $order->id }}</p>
                        <p>Total</p>
                        <p>:</p>
                        <p class="text-right">${{ number_format($order->total, 0, ',', '.') }}</p>
                    </div>
                    <img src="{{ asset('images/qrcode-ewallet.png') }}" class="mx-auto mt-4 rounded-3xl" alt="QR Code">

                    <p class="text-sm text-gray-500 mt-4 text-center">
                        Payment will be verified manually
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>