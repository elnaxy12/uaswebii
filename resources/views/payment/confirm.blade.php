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