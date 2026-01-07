<h3>Halo {{ $order->user->name }}</h3>

<p>
    Silakan lakukan <b>transfer bank</b> untuk order
    <b>#{{ $order->id }}</b>
</p>

<p>
    <b>Total Pembayaran:</b><br>
    ${{ number_format($order->total, 0, ',', '.') }}
</p>

<p><b>Transfer ke rekening berikut:</b></p>
<ul>
    <li>Bank MANDIRI</li>
    <li>No Rekening: 1560022660254</li>
    <li>Atas Nama: ADIDAS</li>
</ul>

<p>
    Setelah melakukan transfer, silakan klik tombol di bawah
    untuk <b>mengirim bukti pembayaran</b>.
</p>

<a href="{{ $paymentLink }}"
    style="padding:10px 16px;background:#000;color:#fff;text-decoration:none;border-radius:6px;">
    Konfirmasi Pembayaran
</a>