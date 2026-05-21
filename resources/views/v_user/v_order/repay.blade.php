@include('base2.start')
<title>Bayar Ulang Order #{{ $order->id }}</title>

<style>
    #payLoadingOverlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(255, 255, 255, 0.85);
        z-index: 9999;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
    }

    #payLoadingOverlay.active {
        display: flex;
    }

    .loader {
        width: 100px;
        aspect-ratio: 1;
        padding: 10px;
        box-sizing: border-box;
        display: grid;
        background: #fff;
        filter: blur(5px) contrast(10) hue-rotate(300deg);
        mix-blend-mode: darken;
    }

    .loader:before,
    .loader:after {
        content: "";
        grid-area: 1/1;
        width: 40px;
        height: 40px;
        background: black;
        animation: l7 2s infinite;
    }

    .loader:after {
        animation-delay: -1s;
    }

    @keyframes l7 {
        0% {
            transform: translate(0, 0)
        }

        25% {
            transform: translate(100%, 0)
        }

        50% {
            transform: translate(100%, 100%)
        }

        75% {
            transform: translate(0, 100%)
        }

        100% {
            transform: translate(0, 0)
        }
    }
</style>
</head>

<body>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="container mx-auto p-6 max-w-2xl">
                <a href="{{ route('user.order') }}"
                    class="group inline-flex items-center gap-2 hover:text-black text-gray-600! mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Orders
                </a>

                <h1 class="text-2xl font-semibold mb-6">Bayar Order #{{ $order->id }}</h1>

                <div class="bg-gray-100 p-4 rounded-lg mb-6 space-y-2 text-sm">
                    <div class="grid grid-cols-[140px_1fr]">
                        <span class="font-semibold">Total</span>
                        <span>: Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="grid grid-cols-[140px_1fr]">
                        <span class="font-semibold">Metode Bayar</span>
                        <span>: <span class="uppercase">{{ $order->last_payment_method ?? 'midtrans' }}</span></span>
                    </div>
                    <div class="grid grid-cols-[140px_1fr]">
                        <span class="font-semibold">Kurir</span>
                        <span>: {{ $order->shipping_courier }} - {{ $order->shipping_service }}</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <table class="w-full text-sm">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="p-2 text-left">Produk</th>
                                <th class="p-2 text-left">Qty</th>
                                <th class="p-2 text-left">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr class="border-b border-gray-100">
                                    <td class="p-2 flex items-center gap-4">
                                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                            class="w-12 h-12 object-cover rounded"> {{ $item->product->name ?? '-' }}
                                        <span class="text-xs text-gray-500">({{ $item->size->code ?? '-' }})</span>
                                    </td>
                                    <td class="p-2">{{ $item->quantity }}</td>
                                    <td class="p-2">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button id="payRepayBtn"
                    class="w-full bg-black text-white py-3 rounded hover:bg-white hover:text-black border border-black transition text-sm cursor-pointer">
                    Bayar Sekarang
                </button>

                {{-- QRIS Section --}}
                <div id="qrisSection" class="hidden mt-6 flex flex-col items-center">
                    <h2 class="text-xl font-bold mb-2">Bayar dengan QRIS</h2>
                    <img id="qrisImage" src="" alt="QR Code" class="w-64 h-64 border p-2 rounded">
                    <p class="mt-4 text-sm text-gray-500">Selesaikan dalam <span id="qrisTimer"
                            class="font-bold text-black">15:00</span></p>
                    <button type="button" onclick="window.location.href='/order/{{ $order->id }}'"
                        class="mt-4 bg-black text-white px-4 py-2 text-sm rounded cursor-pointer">
                        Cek Status Pembayaran
                    </button>
                </div>

                {{-- BCA VA Section --}}
                <div id="bcaSection" class="hidden mt-6 border rounded p-6">
                    <h2 class="text-xl font-bold mb-2">Transfer BCA Virtual Account</h2>
                    <div class="bg-gray-50 rounded p-4 mb-4">
                        <p class="text-sm text-gray-500 mb-1">Nomor Virtual Account</p>
                        <p class="text-2xl font-bold tracking-widest" id="bcaVaNumber">-</p>
                        <button type="button" onclick="copyText('bcaVaNumber')"
                            class="mt-2 text-xs border px-3 py-1 rounded hover:bg-gray-100 cursor-pointer">
                            Salin Nomor
                        </button>
                    </div>
                    <div class="text-sm text-gray-500">
                        <p>Total: <span id="bcaTotal" class="font-semibold text-black"></span></p>
                    </div>
                    <button type="button" onclick="window.location.href='/order/{{ $order->id }}'"
                        class="mt-4 bg-black text-white px-4 py-2 text-sm rounded cursor-pointer">
                        Cek Status Pembayaran
                    </button>
                </div>

                {{-- Mandiri Section --}}
                <div id="mandiriSection" class="hidden mt-6 border rounded p-6">
                    <h2 class="text-xl font-bold mb-2">Mandiri Bill Payment</h2>
                    <div class="bg-gray-50 rounded p-4 mb-4 space-y-3">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Biller Code</p>
                            <p class="text-2xl font-bold tracking-widest" id="mandiriBillerCode">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Bill Key</p>
                            <p class="text-2xl font-bold tracking-widest" id="mandiriBillKey">-</p>
                            <button type="button" onclick="copyText('mandiriBillKey')"
                                class="mt-2 text-xs border px-3 py-1 rounded hover:bg-gray-100 cursor-pointer">
                                Salin Bill Key
                            </button>
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        <p>Total: <span id="mandiriTotal" class="font-semibold text-black"></span></p>
                    </div>
                    <button type="button" onclick="window.location.href='/order/{{ $order->id }}'"
                        class="mt-4 bg-black text-white px-4 py-2 text-sm rounded cursor-pointer">
                        Cek Status Pembayaran
                    </button>
                </div>

                {{-- Alfamart Section --}}
                <div id="alfamartSection" class="hidden mt-6 border rounded p-6">
                    <h2 class="text-xl font-bold mb-2">Bayar di Alfamart</h2>
                    <div class="bg-gray-50 rounded p-4 mb-4">
                        <p class="text-sm text-gray-500 mb-1">Kode Pembayaran</p>
                        <p class="text-2xl font-bold tracking-widest" id="alfamartCode">-</p>
                        <button type="button" onclick="copyText('alfamartCode')"
                            class="mt-2 text-xs border px-3 py-1 rounded hover:bg-gray-100 cursor-pointer">
                            Salin Kode
                        </button>
                    </div>
                    <div class="text-sm text-gray-500">
                        <p>Total: <span id="alfamartTotal" class="font-semibold text-black"></span></p>
                    </div>
                    <button type="button" onclick="window.location.href='/order/{{ $order->id }}'"
                        class="mt-4 bg-black text-white px-4 py-2 text-sm rounded cursor-pointer">
                        Cek Status Pembayaran
                    </button>
                </div>

                {{-- Indomaret Section --}}
                <div id="indomaretSection" class="hidden mt-6 border rounded p-6">
                    <h2 class="text-xl font-bold mb-2">Bayar di Indomaret</h2>
                    <div class="bg-gray-50 rounded p-4 mb-4">
                        <p class="text-sm text-gray-500 mb-1">Kode Pembayaran</p>
                        <p class="text-2xl font-bold tracking-widest" id="indomaretCode">-</p>
                        <button type="button" onclick="copyText('indomaretCode')"
                            class="mt-2 text-xs border px-3 py-1 rounded hover:bg-gray-100 cursor-pointer">
                            Salin Kode
                        </button>
                    </div>
                    <div class="text-sm text-gray-500">
                        <p>Total: <span id="indomaretTotal" class="font-semibold text-black"></span></p>
                    </div>
                    <button type="button" onclick="window.location.href='/order/{{ $order->id }}'"
                        class="mt-4 bg-black text-white px-4 py-2 text-sm rounded cursor-pointer">
                        Cek Status Pembayaran
                    </button>
                </div>

                {{-- Snap fallback --}}
                <div id="snap-container" class="mt-6"></div>
            </div>
        </div>
    </div>

    <div id="toastContainer" class="fixed bottom-6 right-6 z-50 space-y-2"></div>

    <div id="payLoadingOverlay">
        <div class="loader"></div>
        <p style="font-size: 14px; color: #333; margin: 0;">Memuat pembayaran...</p>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        const paymentMethod = '{{ $order->last_payment_method ?? "midtrans" }}';
        const orderId = {{ $order->id }};
        const snapToken = '{{ $snapToken }}';

        document.getElementById('payRepayBtn').addEventListener('click', function () {

            // ✅ show loader
            document.getElementById('payLoadingOverlay').classList.add('active');

            if (paymentMethod === 'qris') {
                fetch('{{ route("checkout.qris") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ order_id: orderId })
                })
                    .then(res => res.json())
                    .then(qris => {
                        document.getElementById('payLoadingOverlay').classList.remove('active'); // ✅

                        if (qris.qr_url) {
                            document.getElementById('qrisImage').src = qris.qr_url;
                            document.getElementById('qrisSection').classList.remove('hidden');
                            document.getElementById('qrisSection').scrollIntoView({ behavior: 'smooth' });
                            showToast('QR Code siap, silakan scan!', 'success');

                            let timeLeft = 15 * 60;
                            const timer = setInterval(() => {
                                const m = Math.floor(timeLeft / 60).toString().padStart(2, '0');
                                const s = (timeLeft % 60).toString().padStart(2, '0');
                                document.getElementById('qrisTimer').textContent = m + ':' + s;
                                if (timeLeft <= 0) { clearInterval(timer); document.getElementById('qrisTimer').textContent = 'Expired'; }
                                timeLeft--;
                            }, 1000);
                        } else {
                            showToast(qris.error ?? 'Gagal mendapatkan QR.', 'error');
                        }
                    })
                    .catch(() => {
                        document.getElementById('payLoadingOverlay').classList.remove('active'); // ✅
                        showToast('Gagal membuat QRIS.', 'error');
                    });
            } else if (paymentMethod === 'bca') {
                fetch('{{ route("checkout.bca") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ order_id: orderId })
                })
                    .then(res => res.json())
                    .then(bca => {
                        document.getElementById('payLoadingOverlay').classList.remove('active'); // ✅
                        if (bca.va_number) {
                            document.getElementById('bcaVaNumber').textContent = bca.va_number;
                            document.getElementById('bcaTotal').textContent = 'Rp' + parseInt(bca.total).toLocaleString('id-ID');
                            document.getElementById('bcaSection').classList.remove('hidden');
                            document.getElementById('bcaSection').scrollIntoView({ behavior: 'smooth' });
                            showToast('Nomor VA BCA berhasil dibuat!', 'success');
                        } else {
                            showToast(bca.error ?? 'Gagal mendapatkan VA.', 'error');
                        }
                    })
                    .catch(() => {
                        document.getElementById('payLoadingOverlay').classList.remove('active'); // ✅
                        showToast('Gagal membuat BCA VA.', 'error');
                    });

            } else if (paymentMethod === 'mandiri') {
                fetch('{{ route("checkout.mandiri") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ order_id: orderId })
                })
                    .then(res => res.json())
                    .then(mandiri => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        if (mandiri.bill_key) {
                            document.getElementById('mandiriBillKey').textContent = mandiri.bill_key;
                            document.getElementById('mandiriBillerCode').textContent = mandiri.biller_code;
                            document.getElementById('mandiriTotal').textContent = 'Rp' + Math.round(mandiri.total).toLocaleString('id-ID');
                            document.getElementById('mandiriSection').classList.remove('hidden');
                            document.getElementById('mandiriSection').scrollIntoView({ behavior: 'smooth' });
                            showToast('Kode Mandiri Bill Payment berhasil dibuat!', 'success');
                        } else {
                            showToast(mandiri.error ?? 'Gagal mendapatkan kode Mandiri.', 'error');
                        }
                    })
                    .catch(() => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        showToast('Gagal membuat Mandiri Bill.', 'error');
                    });

            } else if (paymentMethod === 'alfamart') {
                fetch('{{ route("checkout.alfamart") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ order_id: orderId })
                })
                    .then(res => res.json())
                    .then(alfa => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        if (alfa.payment_code) {
                            document.getElementById('alfamartCode').textContent = alfa.payment_code;
                            document.getElementById('alfamartTotal').textContent = 'Rp' + Math.round(alfa.total).toLocaleString('id-ID');
                            document.getElementById('alfamartSection').classList.remove('hidden');
                            document.getElementById('alfamartSection').scrollIntoView({ behavior: 'smooth' });
                            showToast('Kode Alfamart berhasil dibuat!', 'success');
                        } else {
                            showToast(alfa.error ?? 'Gagal mendapatkan kode Alfamart.', 'error');
                        }
                    })
                    .catch(() => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        showToast('Gagal membuat kode Alfamart.', 'error');
                    });

            } else if (paymentMethod === 'indomaret') {
                fetch('{{ route("checkout.indomaret") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ order_id: orderId })
                })
                    .then(res => res.json())
                    .then(indo => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        if (indo.payment_code) {
                            document.getElementById('indomaretCode').textContent = indo.payment_code;
                            document.getElementById('indomaretTotal').textContent = 'Rp' + Math.round(indo.total).toLocaleString('id-ID');
                            document.getElementById('indomaretSection').classList.remove('hidden');
                            document.getElementById('indomaretSection').scrollIntoView({ behavior: 'smooth' });
                            showToast('Kode Indomaret berhasil dibuat!', 'success');
                        } else {
                            showToast(indo.error ?? 'Gagal mendapatkan kode Indomaret.', 'error');
                        }
                    })
                    .catch(() => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        showToast('Gagal membuat kode Indomaret.', 'error');
                    });
            } else {
                // fallback: Snap popup untuk mandiri, alfamart, indomaret, dll
                snap.pay(snapToken, {
                    onSuccess: () => window.location.href = '/order/' + orderId,
                    onPending: () => window.location.href = '/order/' + orderId,
                    onError: () => {
                        document.getElementById('payLoadingOverlay').classList.remove('active');
                        showToast('Pembayaran gagal.', 'error');
                    },
                    onClose: () => {
                        document.getElementById('payLoadingOverlay').classList.remove('active'); // ✅ hide saat popup ditutup
                    }
                });
            }
        });

        function copyText(elementId) {
            const text = document.getElementById(elementId).textContent;
            navigator.clipboard.writeText(text).then(() => showToast('Berhasil disalin!', 'success'));
        }

        function showToast(message, type = 'success') {
            const colors = { success: 'bg-black text-white', error: 'bg-red-600 text-white', info: 'bg-gray-700 text-white' };
            const toast = document.createElement('div');
            toast.className = `${colors[type]} px-5 py-3 rounded shadow-lg text-sm flex items-center gap-3 transition-all duration-300 opacity-0 translate-y-2`;
            toast.innerHTML = `<span>${message}</span><button onclick="this.parentElement.remove()" class="ml-auto text-white opacity-70 hover:opacity-100 cursor-pointer">✕</button>`;
            document.getElementById('toastContainer').appendChild(toast);
            requestAnimationFrame(() => {
                toast.classList.remove('opacity-0', 'translate-y-2');
                toast.classList.add('opacity-100', 'translate-y-0');
            });
            setTimeout(() => { toast.classList.add('opacity-0'); setTimeout(() => toast.remove(), 300); }, 4000);
        }
    </script>
</body>

</html>