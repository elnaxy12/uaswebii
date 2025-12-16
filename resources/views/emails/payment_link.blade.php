<h3>Halo {{ $order->user->name }}</h3>

<p>Silakan lakukan pembayaran untuk order <b>#{{ $order->id }}</b></p>

<p>Total: <b>${{ number_format($order->total, 0, ',', '.') }}</b></p>

<a href="{{ $paymentLink }}">Buy Now</a>