@include('base2.start')

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
    <div id="smooth-wrapper">
        <div id="smooth-content">
            @include('base2.navbar')
            <div class="relative h-screen">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border px-8 py-8">
                    <h2>Konfirmasi Pembayaran</h2>
                    
                    <p>Order: <b>#{{ $order->id }}</b></p>
                    <p>Total: <b>${{ number_format($order->total, 0, ',', '.') }}</b></p>
                    
                    <p><b>Transfer ke:</b></p>
                    <ul>
                        <li>Bank MANDIRI</li>
                        <li>No Rekening: 1560022660254</li>
                        <li>Atas Nama: ADIDAS</li>
                    </ul>
                    
                    <form method="POST" action="{{ route('payment.submit', $order->id) }}" enctype="multipart/form-data">
                        @csrf
                    
                        <input type="text" name="sender_name" placeholder="Nama Pengirim" required>
                        <input type="file" name="payment_proof" required>
                    
                        <button type="submit">Kirim Bukti Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
    @include('base2.end')
</body>