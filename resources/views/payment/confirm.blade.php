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
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border px-8 py-8">
                    <div class="fixed hidden md:block top-0 right-0 -z-10">
                        <img src="https://preview.thenewsmarket.com/Previews/ADID/StillAssets/1920x1440/689347.jpg" width="90">
                    </div>
                    @if ($order->payment_expired_at)
                        <p id="countdown">
                            --:--:--
                        </p>
                    @endif
                    <h1 class="my-2"><b>Payment Confirmation</b></h1>
                    
                    <div class="grid grid-cols-3">
                        <p>Order ID</p>
                        <p>:</p>
                        <p>#{{ $order->id }}</p>
                        <p>Total</p>
                        <p>:</p>
                        <p>${{ number_format($order->total, 0, ',', '.') }}</p>
                    </div>

                    <p class="my-2"><b>Transfer to:</b></p>

                    <div class="grid grid-cols-3">
                        <p>Bank</p>
                        <p>:</p>
                        <p>MANDIRI</p>
                        <p>Account No</p>
                        <p>:</p>
                        <p>1560022660254</p>
                        <p>Name</p>
                        <p>:</p>
                        <p>GILANG ARYA LEKSANA</p>
                    </div>

                    <div class="my-2">
                        <form method="POST" action="{{ route('payment.submit', $order->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="flex-col flex gap-2">
                                <input class="outline-none border-b" type="text" name="sender_name"
                                    placeholder="Sender Name" required>
                                <input class="border py-2 px-3 bg-gray-200 border-gray-500" type="file"
                                    name="payment_proof" required>
                                @error('payment_proof')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror

                                <button
                                    class="border bg-black text-white px-3 py-2 cursor-pointer focus:bg-white focus:text-black"
                                    type="submit">Kirim Bukti Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdownEl = document.getElementById('countdown');
            if (!countdownEl) return;

            const expiredAt = new Date("{{ $expiredAt->toIso8601String() }}").getTime();

            const timer = setInterval(function () {
                const now = new Date().getTime();
                const distance = expiredAt - now;

                if (distance <= 0) {
                    clearInterval(timer);
                    countdownEl.textContent = "Payment time out";
                    return;
                }

                const hours = Math.floor(distance / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownEl.textContent =
                    String(hours).padStart(2, '0') + ':' +
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0');
            }, 1000);
        });
    </script>
    @include('base2.end')
</body>