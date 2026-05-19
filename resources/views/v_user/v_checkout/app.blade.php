@include('base2.start')
<title>Tab Checkout | Adidas</title>
</head>

<body>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="container mx-auto p-6">
                <form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
                    @csrf

                    <h1 class="text-2xl font-semibold open-sans mb-6">Tab Checkout</h1>

                    {{-- Alert --}}
                    @if(session('error'))
                        <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Cart Items --}}
                    <table class="min-w-full mb-6 ">
                        <thead>
                            <tr class="bg-black text-white">
                                <th class="p-2 border">Product</th>
                                <th class="p-2 border">Size</th>
                                <th class="p-2 border">Price</th>
                                <th class="p-2 border">Quantity</th>
                                <th class="p-2 border">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($cartItems as $item)
                                @php
                                    $price = $item->product->price ?? 0;
                                    $additional = $item->additional_price ?? 0;
                                    $qty = $item->quantity ?? 0;
                                    $subtotal = ($price + $additional) * $qty;
                                    $total += $subtotal;
                                @endphp

                                <tr class="text-center">
                                    <td class="p-2">{{ $item->product->name }}</td>
                                    <td class="p-2">{{ $item->size->code ?? '-' }}</td>
                                    <td class="p-2">Rp{{ number_format($price + $additional, 2, ',', '.') }}</td>
                                    <td class="p-2">{{ $qty }}</td>
                                    <td class="p-2">Rp{{ number_format($subtotal, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right text-xl font-semibold mb-6">
                        Total: Rp{{ number_format($total, 2, ',', '.') }}
                    </div>

                    {{-- Customer & Payment Form --}}
                    <h2 class="text-xl font-bold mt-8 mb-4">Customer Information</h2>

                    <div class="grid grid-cols-2 gap-4 select-none">
                        <div>
                            <label class="block mb-1 font-semibold">First Name</label>
                            <input type="text" name="first_name" value="{{ auth()->user()->first_name }}"
                                class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Last Name</label>
                            <input type="text" name="last_name" value="{{ auth()->user()->last_name }}"
                                class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                            class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Phone</label>
                        <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                            class="px-3 py-2 w-full outline-none border-b-black border-b-1" required readonly>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold">Address</label>
                        <textarea name="address" rows="3"
                            class="px-3 py-2 w-full outline-none border-b-black border-b-1" required
                            readonly>{{ auth()->user()->province_name }}, {{ auth()->user()->city_name }}, {{ auth()->user()->address }}</textarea>
                    </div>

                    {{-- Shipping Options --}}
                    <h2 class="text-xl font-bold mt-8 mb-4">Select Shipping</h2>

                    <div class="space-y-3">
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Kurir</label>
                                <select id="courierSelect" class="border px-3 py-2 rounded w-full outline-none text-sm">
                                    <option value="jne">JNE</option>
                                    <option value="jnt">J&T</option>
                                    <option value="pos">POS Indonesia</option>
                                    <option value="sicepat">SiCepat</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-1 font-semibold text-sm">Berat (gram)</label>
                                <input type="number" id="weightInput" value="500" min="1"
                                    class="border px-3 py-2 rounded w-full outline-none text-sm" disabled>
                            </div>
                            <div class="flex items-end">
                                <button type="button" id="checkOngkirBtn"
                                    class="bg-black text-white px-4 py-2 rounded text-sm hover:bg-white hover:border-black hover:text-black focus:text-black focus:bg-white border border-black w-full cursor-pointer">
                                    Cek Ongkir
                                </button>
                            </div>
                        </div>

                        <div id="ongkirResult" class="hidden space-y-2"></div>

                        {{-- hidden input untuk dikirim ke controller --}}
                        <input type="hidden" name="shipping_service" id="selectedService">
                        <input type="hidden" name="shipping_cost" id="selectedCost">
                        <input type="hidden" name="shipping_courier" id="selectedCourier">

                        {{-- Total Keseluruhan --}}
                        <div id="grandTotalSection" class="hidden text-right text-xl font-semibold mt-4 pt-4">
                            Total Pembayaran: <span id="grandTotal">Rp0</span>
                        </div>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <h2 class="text-xl font-bold mt-8 mb-4">Metode Pembayaran</h2>
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">

                        <button type="button" onclick="selectPayment('qris')"
                            class="payment-option border-2 rounded px-4 py-3 flex flex-col items-center justify-center gap-2 hover:border-black transition cursor-pointer">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg"
                                class="h-8 object-contain" alt="QRIS">
                        </button>

                        <button type="button" onclick="selectPayment('mandiri')"
                            class="payment-option border-2 rounded px-4 py-3 flex flex-col items-center justify-center gap-2 hover:border-black transition cursor-pointer">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg"
                                class="h-8 object-contain" alt="Mandiri">
                        </button>

                        <button type="button" onclick="selectPayment('bca')"
                            class="payment-option border-2 rounded px-4 py-3 flex flex-col items-center justify-center gap-2 hover:border-black transition cursor-pointer">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                                class="h-8 object-contain" alt="BCA">
                        </button>

                        <button type="button" onclick="selectPayment('alfamart')"
                            class="payment-option border-2 rounded px-4 py-3 flex flex-col items-center justify-center gap-2 hover:border-black transition cursor-pointer">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/ALFAMART_LOGO_BARU.png/960px-ALFAMART_LOGO_BARU.png"
                                class="h-8 object-contain" alt="Alfamart">
                        </button>

                        <button type="button" onclick="selectPayment('indomaret')"
                            class="payment-option border-2 rounded px-4 py-3 flex flex-col items-center justify-center gap-2 hover:border-black transition cursor-pointer">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Logo_Indomaret.png/960px-Logo_Indomaret.png"
                                class="h-8 object-contain" alt="Indomaret">
                        </button>

                    </div>

                    <p id="paymentError" class="hidden text-red-500 text-sm mt-2">Pilih metode pembayaran terlebih
                        dahulu.</p>

                    <input type="hidden" name="payment_method" id="selectedPayment">

                    <button type="button" id="payBtn"
                        class="inline-block border bg-black text-white px-6 py-2 rounded hover:bg-white focus:bg-white focus:text-black focus:border-black hover:border-black hover:text-black cursor-pointer text-sm">
                        Confirm & Pay
                    </button>

                    {{-- QRIS Section --}}
                    <div id="qrisSection" class="hidden mt-6 flex flex-col items-center">
                        <h2 class="text-xl font-bold mb-2">Bayar dengan QRIS</h2>
                        <p class="text-sm text-gray-500 mb-4">Scan QR code berikut dengan GoPay, OVO, Dana, atau
                            aplikasi apapun yang
                            support QRIS</p>
                        <img id="qrisImage" src="" alt="QR Code" class="w-64 h-64 border p-2 rounded">
                        <p class="mt-4 text-sm text-gray-500">Selesaikan pembayaran dalam <span id="qrisTimer"
                                class="font-bold text-black">15:00</span></p>
                        <div class="flex gap-3 mt-4">
                            <a id="qrisDownload" href="#" download="qris.png"
                                class="border px-4 py-2 text-sm rounded hover:bg-gray-100">
                                Download QR
                            </a>
                            <button type="button" onclick="checkQrisStatus()"
                                class="bg-black text-white px-4 py-2 text-sm rounded hover:bg-gray-800 cursor-pointer">
                                Cek Status Pembayaran
                            </button>
                        </div>
                    </div>

                    {{-- BCA VA Section --}}
                    <div id="bcaSection" class="hidden mt-6 border rounded p-6">
                        <h2 class="text-xl font-bold mb-2">Transfer BCA Virtual Account</h2>
                        <p class="text-sm text-gray-500 mb-4">Selesaikan pembayaran sebelum expired</p>
                        <div class="bg-gray-50 rounded p-4 mb-4">
                            <p class="text-sm text-gray-500 mb-1">Nomor Virtual Account</p>
                            <p class="text-2xl font-bold tracking-widest" id="bcaVaNumber">-</p>
                            <button type="button" onclick="copyVa()"
                                class="mt-2 text-xs border px-3 py-1 rounded hover:bg-gray-100 cursor-pointer">
                                Salin Nomor
                            </button>
                        </div>
                        <div class="text-sm text-gray-500 space-y-1">
                            <p>Total Pembayaran: <span id="bcaTotal" class="font-semibold text-black"></span></p>
                            <p>Bank: <span class="font-semibold text-black">BCA</span></p>
                        </div>
                        <div class="flex gap-3 mt-4">
                            <button type="button" onclick="checkBcaStatus()"
                                class="bg-black text-white px-4 py-2 text-sm rounded hover:bg-gray-800 cursor-pointer">
                                Cek Status Pembayaran
                            </button>
                        </div>
                    </div>

                    <div id="snap-container" class="mt-6"></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const cityId = "{{ auth()->user()->city_id }}";
        const productTotal = {{ $total }};

        // ✅ 1. Cek Ongkir
        document.getElementById('checkOngkirBtn').addEventListener('click', function () {
            const courier = document.getElementById('courierSelect').value;
            const weight = document.getElementById('weightInput').value;
            const resultDiv = document.getElementById('ongkirResult');

            resultDiv.innerHTML = '<p class="text-sm text-gray-500">Mengecek ongkir...</p>';
            resultDiv.classList.remove('hidden');

            fetch('/api/cost', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    origin: '501',
                    destination: cityId,
                    weight: weight,
                    courier: courier
                })
            })
                .then(res => res.json())
                .then(data => {
                    console.log(JSON.stringify(data));
                    const services = data?.data ?? [];

                    if (services.length === 0) {
                        resultDiv.innerHTML = '<p class="text-sm text-red-500">Tidak ada layanan tersedia.</p>';
                        return;
                    }

                    resultDiv.innerHTML = '<p class="font-semibold text-sm mb-2">Pilih Layanan:</p>';

                    services.forEach(service => {
                        const cost = service.cost;
                        const etd = service.etd;

                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'w-full text-left border px-4 py-2 rounded text-sm hover:border-black transition service-option';
                        btn.innerHTML = `
                    <span class="font-semibold">${service.code.toUpperCase()} - ${service.service}</span>
                    <span class="text-gray-500 text-xs ml-2">${service.description}</span>
                    <span class="float-right font-semibold">Rp${cost.toLocaleString('id-ID')}</span>
                    <span class="float-right text-xs text-gray-500 mr-4">ETD: ${etd}</span>
                `;

                        btn.addEventListener('click', function () {
                            document.querySelectorAll('.service-option').forEach(b => {
                                b.classList.remove('border-black', 'bg-gray-50');
                            });
                            this.classList.add('border-black', 'bg-gray-50');

                            document.getElementById('selectedService').value = service.service;
                            document.getElementById('selectedCost').value = cost;
                            document.getElementById('selectedCourier').value = service.code.toUpperCase();

                            const grandTotal = productTotal + cost;
                            document.getElementById('grandTotal').textContent = 'Rp' + grandTotal.toLocaleString('id-ID');
                            document.getElementById('grandTotalSection').classList.remove('hidden');
                        });

                        resultDiv.appendChild(btn);
                    });
                })
                .catch(() => {
                    resultDiv.innerHTML = '<p class="text-sm text-red-500">Gagal mengambil data ongkir.</p>';
                });
        }); // ✅ tutup checkOngkirBtn di sini

        // ✅ 2. Pilih Metode Pembayaran (di luar semua listener)
        function selectPayment(method) {
            document.querySelectorAll('.payment-option').forEach(btn => {
                btn.classList.remove('border-black', 'bg-gray-50');
                btn.classList.add('border-gray-200');
            });

            event.currentTarget.classList.add('border-black', 'bg-gray-50');
            event.currentTarget.classList.remove('border-gray-200');

            document.getElementById('selectedPayment').value = method;
            document.getElementById('paymentError').classList.add('hidden');
        }

        // ✅ 3. Confirm & Pay (di luar semua listener)
        document.getElementById('payBtn').addEventListener('click', function () {
            if (!document.getElementById('selectedPayment').value) {
                document.getElementById('paymentError').classList.remove('hidden');
                document.getElementById('paymentError').scrollIntoView({ behavior: 'smooth' });
                return;
            }

            const form = document.querySelector('form');
            const formData = new FormData(form);

            fetch('{{ route("checkout.process") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const paymentMethod = document.getElementById('selectedPayment').value;

                    if (data.snap_token) {
                        if (paymentMethod === 'qris') {
                            // Flow QRIS — tampilkan QR
                            fetch('{{ route("checkout.qris") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({ order_id: data.order_id })
                            })
                                .then(res => res.json())
                                .then(qris => {
                                    if (qris.qr_url) {
                                        document.getElementById('qrisImage').src = qris.qr_url;
                                        document.getElementById('qrisDownload').href = qris.qr_url;
                                        document.getElementById('qrisSection').classList.remove('hidden');
                                        document.getElementById('qrisSection').scrollIntoView({ behavior: 'smooth' });

                                        window._qrisOrderId = qris.order_id;

                                        let timeLeft = 15 * 60;
                                        const timer = setInterval(() => {
                                            const m = Math.floor(timeLeft / 60).toString().padStart(2, '0');
                                            const s = (timeLeft % 60).toString().padStart(2, '0');
                                            document.getElementById('qrisTimer').textContent = m + ':' + s;
                                            if (timeLeft <= 0) {
                                                clearInterval(timer);
                                                document.getElementById('qrisTimer').textContent = 'Expired';
                                            }
                                            timeLeft--;
                                        }, 1000);

                                        window._qrisTimer = timer;
                                    } else {
                                        alert(qris.error ?? 'Gagal mendapatkan QR code.');
                                    }
                                })
                                .catch(() => alert('Gagal membuat QRIS.'));

                        } else if (paymentMethod === 'bca') {
                            fetch('{{ route("checkout.bca") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({ order_id: data.order_id })
                            })
                                .then(res => res.json())
                                .then(bca => {
                                    if (bca.va_number) {
                                        document.getElementById('bcaVaNumber').textContent = bca.va_number;
                                        document.getElementById('bcaTotal').textContent = 'Rp' + bca.total.toLocaleString('id-ID');
                                        document.getElementById('bcaSection').classList.remove('hidden');
                                        document.getElementById('bcaSection').scrollIntoView({ behavior: 'smooth' });
                                        window._bcaOrderId = bca.order_id;
                                    } else {
                                        alert(bca.error ?? 'Gagal mendapatkan nomor VA.');
                                    }
                                })
                                .catch(() => alert('Gagal membuat BCA VA.'));

                        } else {
                            alert('Pembayaran ' + paymentMethod.toUpperCase() + ' akan segera diproses.');
                        }
                    } else {
                        alert(data.error ?? 'Terjadi kesalahan.');
                    }
                })
                .catch(() => alert('Gagal menghubungi server.'));
        }); // ✅ tutup payBtn di sini
    </script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        function checkQrisStatus() {
            window.location.href = '/order/' + window._qrisOrderId;
        }

        function copyVa() {
            const va = document.getElementById('bcaVaNumber').textContent;
            navigator.clipboard.writeText(va).then(() => alert('Nomor VA berhasil disalin!'));
        }

        function checkBcaStatus() {
            window.location.href = '/order/' + window._bcaOrderId;
        }
    </script>

    <script>
        window.addEventListener('beforeunload', function () {
            fetch('{{ route("buy.now.cancel") }}', {
                method: 'GET',
                credentials: 'same-origin'
            });
        });
    </script>

</body>

</html>