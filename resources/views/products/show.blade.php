<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Detail Product</title>

    <!-- Favicon -->
    <link rel="icon"
        href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18h-5.298a.5.5 0 0 1-.423-.233l-5.535-8.775a.499.499 0 0 1 .175-.701l3.888-2.225a.5.5 0 0 1 .671.167l6.945 11A.5.5 0 0 1 23.5 18zm-5.022-1h4.115l-6.205-9.828-3.02 1.728 5.11 8.1zm-3.463 1H9.721a.502.502 0 0 1-.423-.233L6.23 12.909a.499.499 0 0 1 .175-.701l3.892-2.229a.5.5 0 0 1 .671.167l4.47 7.086a.5.5 0 0 1-.423.768zm-5.019-1h4.112l-3.731-5.915-3.022 1.731L9.996 17zm-3.604 1H1.095a.5.5 0 0 1-.423-.233l-.595-.944a.5.5 0 0 1 .175-.701l3.892-2.224a.5.5 0 0 1 .671.167l2 3.168a.5.5 0 0 1-.423.767zm-5.021-1h4.115l-1.261-1.997-3.023 1.728.169.269z"/></svg>'
        type="image/svg+xml" />

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/beranda.css', 'resources/js/scrollsmooth.js'])
</head>

<body id="overlay" class="fadeIn">
    {{-- @include('base2.navbar') --}}
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="container mx-auto px-4 py-8">
                <!-- Breadcrumb Navigation -->
                <nav class="mb-6 text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="hover:text-black transition">Home</a>
                    <span class="mx-2">/</span>
                    <a class="hover:text-black transition">Products</a>
                    <span class="mx-2">/</span>
                    <span class="text-black font-medium">{{ $product->name }}</span>
                </nav>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    <!-- Product Image Section -->
                    <div class="bg-white p-4 md:p-6">
                        <div id="backToTop" class="mb-4 overflow-hidden relative">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                class="w-full h-auto object-cover transition-transform ease-out duration-100 cursor-all-scroll"
                                id="zoomImg">
                        </div>

                        <div id="modal"
                            class="fixed inset-0 bg-black bg-opacity-70 hidden z-50 overflow-auto select-none">
                            <div class="flex justify-center items-center h-screen p-4">
                                <img id="modalImg" src="{{ $product->image }}"
                                    class="max-h-[80vh] max-w-full rounded cursor-zoom-out" />
                            </div>
                        </div>

                    </div>

                    <!-- Product Info Section -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <!-- Product Title & Badge -->
                        <div class="mb-4">
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            @if($product->badge)
                                <span
                                    class="inline-block bg-black text-white px-3 py-1 rounded-full text-xs md:text-sm font-medium">
                                    {{ $product->badge }}
                                </span>
                            @endif
                        </div>

                        <!-- Price & Views -->
                        <div class="mb-6">
                            <p class="text-3xl md:text-4xl font-bold text-gray-900">
                                ${{ number_format($product->price, 2) }}
                            </p>
                            <div class="flex items-center space-x-4 mt-2">
                                <p class="text-gray-600">
                                    <i class="fas fa-box mr-1"></i>
                                    Stock: <strong class="text-gray-900">{{ $product->stock }}</strong> available
                                </p>
                                @if($product->views > 0)
                                    <p class="text-gray-600">
                                        <i class="fas fa-eye mr-1"></i>
                                        {{ $product->views }} views
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Dynamic Size Selection from Database -->
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-semibold text-gray-900">Select Size</h3>
                                <span class="text-sm text-gray-500">(Required)</span>
                            </div>

                            @if($product->sizes && $product->sizes->count() > 0)
                                <div class="flex flex-wrap gap-2 mb-3" id="sizeSelection">
                                    @foreach($product->sizes as $size)
                                        @php
        $stock = $size->pivot->stock ?? 0;
        $isAvailable = $stock > 0;
        $isFirst = $loop->first;
                                        @endphp

                                        <button type="button" class="size-btn px-4 py-3 border rounded-lg text-sm font-medium transition-all duration-200
                                                                       @if($isAvailable)
                                                                           hover:border-black hover:bg-gray-50 cursor-pointer
                                                                           {{ $isFirst ? 'bg-black text-white border-black' : 'bg-white text-gray-900 border-gray-300' }}
                                                                       @else
                                                                           opacity-50 cursor-not-allowed bg-gray-100 border-gray-200
                                                                       @endif" data-size-id="{{ $size->id }}"
                                            data-size-code="{{ $size->code }}" data-stock="{{ $stock }}" {{ !$isAvailable ? 'disabled' : '' }}>
                                            <div class="flex flex-col items-center">
                                                <span class="font-medium">{{ $size->code }}</span>
                                                @if(!$isAvailable)
                                                    <span class="text-xs text-red-500 mt-1">Out of Stock</span>
                                                @else
                                                    <span class="text-xs text-gray-500 mt-1">{{ $stock }} left</span>
                                                @endif
                                            </div>
                                        </button>
                                    @endforeach
                                </div>

                                <div class="mb-2">
                                    <p class="text-gray-700">
                                        Selected: <span id="selectedSize" class="font-semibold text-black">
                                            {{ $product->sizes->first()->code ?? 'None' }}
                                        </span>
                                    </p>
                                    <p id="sizeStockInfo" class="text-sm mt-1">
                                        @if(($product->sizes->first()->pivot->stock ?? 0) > 0)
                                            <span class="text-green-600">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                {{ $product->sizes->first()->pivot->stock }} items available
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            @else
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                    <p class="text-yellow-700 flex items-center">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        No sizes available for this product
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Quantity Selector -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Quantity</h3>
                            <div class="flex items-center space-x-4 max-w-xs">
                                <button id="decreaseQty"
                                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center 
                                               hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition" disabled>
                                    <i class="fas fa-minus text-gray-600"></i>
                                </button>

                                <input type="number" id="quantity" value="1" min="1" max="1"
                                    class="w-20 text-center border border-gray-300 rounded-lg py-2 focus:border-black focus:ring-1 focus:ring-black outline-none"
                                    readonly>

                                <button id="increaseQty"
                                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center 
                                               hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition" disabled>
                                    <i class="fas fa-plus text-gray-600"></i>
                                </button>

                                <span class="text-sm text-gray-500">
                                    Max: <span id="maxQuantity">1</span> items
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <form action="{{ route('cart.store') }}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="size_id" id="selectedSizeId" value="">
                                <input type="hidden" name="quantity" id="selectedQuantity" value="1">

                                <button type="submit" id="addToCartBtn"
                                    class="bg-black text-white hover:bg-gray-800 font-semibold py-3 px-6 rounded-lg h-full
                                           transition duration-200 flex items-center justify-center gap-2 opacity-50 cursor-not-allowed" disabled>
                                    <i class="fas fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>

                            <form action="{{ route('buy.now') }}" method="POST">
                                @csrf
                                <input type="hidden" id="buyNowSize" name="size_id">
                                <input type="hidden" id="buyNowQuantity" name="quantity">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <button id="buyNowBtn" disabled class="flex-1 border-2 border-black text-black hover:bg-black hover:text-white
                                    font-semibold py-3 px-6 rounded-lg transition duration-200
                                    flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed" type="submit">
                                    Buy Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="h-screen">
                    <!-- Product Details -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4 pt-4">Product Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($product->description)
                                <div class="col-span-2">
                                    <strong class="text-gray-700 text-sm font-medium block mb-1">Description:</strong>
                                    <p class="text-gray-600">{{ $product->description }}</p>
                                </div>
                            @endif

                            <div>
                                <strong class="text-gray-700 text-sm font-medium block mb-1">Category:</strong>
                                <span class="text-gray-600">{{ $product->etalase->name ?? $product->etalase_id }}</span>
                            </div>

                            <div>
                                <strong class="text-gray-700 text-sm font-medium block mb-1">Product ID:</strong>
                                <span class="text-gray-600">{{ $product->id }}</span>
                            </div>

                            <div>
                                <strong class="text-gray-700 text-sm font-medium block mb-1">Added Date:</strong>
                                <span class="text-gray-600">{{ $product->created_at->format('M d, Y') }}</span>
                            </div>

                            <div>
                                <strong class="text-gray-700 text-sm font-medium block mb-1">Last Updated:</strong>
                                <span class="text-gray-600">{{ $product->updated_at->format('M d, Y') }}</span>
                            </div>

                            @if($product->sizes && $product->sizes->count() > 0)
                                <div class="col-span-2">
                                    <strong class="text-gray-700 text-sm font-medium block mb-1">Available Sizes:</strong>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach($product->sizes as $size)
                                            @if(($size->pivot->stock ?? 0) > 0)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm 
                                                                                    {{ $loop->first ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                                                    {{ $size->code }}
                                                    <span class="ml-1 text-xs">({{ $size->pivot->stock }})</span>
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        @auth
                            <a href="{{ route('beranda') }}"
                                class="inline-flex items-center gap-2 text-gray-600 hover:text-black transition no-underline">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Beranda
                            </a>
                        @else
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center gap-2 text-gray-600 hover:text-black transition no-underline">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Home
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('base2.end')

    <!-- JavaScript for Interactive Features -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qtyMain = document.getElementById('quantity');  // quantity utama
        const qtyBuyNow = document.querySelector('form[action="{{ route('buy.now') }}"] input[name="quantity"]');

        if (qtyMain && qtyBuyNow) {

            // Set awal
            qtyBuyNow.value = qtyMain.value;

            // Kalau quantity berubah manual
            qtyMain.addEventListener('input', function () {
                qtyBuyNow.value = qtyMain.value;
            });

            // Kalau pakai tombol +
            document.getElementById('increaseQty')?.addEventListener('click', function () {
                qtyBuyNow.value = qtyMain.value;
            });

            // Kalau pakai tombol -
            document.getElementById('decreaseQty')?.addEventListener('click', function () {
                qtyBuyNow.value = qtyMain.value;
            });
        }
    });
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectedSizeId = null;
            let selectedSizeCode = '';
            let selectedStock = 0;
            let quantity = 1;
            let maxQuantity = 1;

            const sizeButtons = document.querySelectorAll('.size-btn');
            const quantityInput = document.getElementById('quantity');
            const selectedSizeIdInput = document.getElementById('selectedSizeId');
            const selectedQuantityInput = document.getElementById('selectedQuantity');
            const addToCartBtn = document.getElementById('addToCartBtn');
            const buyNowBtn = document.getElementById('buyNowBtn');
            const decreaseBtn = document.getElementById('decreaseQty');
            const increaseBtn = document.getElementById('increaseQty');
            const maxQuantitySpan = document.getElementById('maxQuantity');
            const selectedSizeSpan = document.getElementById('selectedSize');
            const sizeStockInfo = document.getElementById('sizeStockInfo');

            // Auto select first available size
            const firstAvailableBtn = document.querySelector('.size-btn:not([disabled])');
            if (firstAvailableBtn) {
                selectSize(firstAvailableBtn);
            }

            // Size selection
            sizeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    if (this.disabled) return;
                    selectSize(this);
                });
            });

            // Quantity controls
            decreaseBtn.addEventListener('click', function () {
                if (quantity > 1) {
                    quantity--;
                    updateQuantity();
                }
            });

            increaseBtn.addEventListener('click', function () {
                if (quantity < maxQuantity) {
                    quantity++;
                    updateQuantity();
                }
            });

            quantityInput.addEventListener('change', function () {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) value = 1;
                if (value > maxQuantity) value = maxQuantity;
                quantity = value;
                updateQuantity();
            });

            // Functions
            function selectSize(button) {
                // Reset all buttons
                sizeButtons.forEach(btn => {
                    btn.classList.remove('bg-black', 'text-white', 'border-black');
                    btn.classList.add('bg-white', 'text-gray-900', 'border-gray-300');
                });

                // Select clicked button
                button.classList.remove('bg-white', 'text-gray-900', 'border-gray-300');
                button.classList.add('bg-black', 'text-white', 'border-black');

                // Update variables
                selectedSizeId = button.dataset.sizeId;
                selectedSizeCode = button.dataset.sizeCode;
                selectedStock = parseInt(button.dataset.stock);
                maxQuantity = Math.min(selectedStock, 10);

                // Reset quantity to 1
                quantity = 1;

                // Update UI
                selectedSizeSpan.textContent = selectedSizeCode;
                maxQuantitySpan.textContent = maxQuantity;
                quantityInput.max = maxQuantity;

                if (selectedStock > 0) {
                    sizeStockInfo.innerHTML = `<span class="text-green-600">
                    <i class="fas fa-check-circle mr-1"></i>
                    ${selectedStock} items available
                </span>`;
                } else {
                    sizeStockInfo.innerHTML = `<span class="text-red-600">
                    <i class="fas fa-times-circle mr-1"></i>
                    Out of stock
                </span>`;
                }

                // Update hidden inputs
                updateHiddenInputs();
                updateButtons();
                updateQuantityControls();
            }

            function updateQuantity() {
                quantityInput.value = quantity;
                updateHiddenInputs();
                updateQuantityControls();
                updateButtons();
            }

            function updateHiddenInputs() {
                selectedSizeIdInput.value = selectedSizeId; // untuk form utama / Add to Cart
                selectedQuantityInput.value = quantity;     // untuk form utama / Add to Cart

                // update form Buy Now juga
                const buyNowSizeInput = document.getElementById('buyNowSize');
                if (buyNowSizeInput) buyNowSizeInput.value = selectedSizeId;

                const buyNowQuantityInput = document.getElementById('buyNowQuantity');
                if (buyNowQuantityInput) buyNowQuantityInput.value = quantity;
            }


            function updateQuantityControls() {
                decreaseBtn.disabled = quantity <= 1;
                increaseBtn.disabled = quantity >= maxQuantity;

                // Update button styles
                decreaseBtn.className = `w-10 h-10 rounded-full border flex items-center justify-center transition ${decreaseBtn.disabled ? 'border-gray-200 opacity-50 cursor-not-allowed' : 'border-gray-300 hover:bg-gray-50 cursor-pointer'
                    }`;

                increaseBtn.className = `w-10 h-10 rounded-full border flex items-center justify-center transition ${increaseBtn.disabled ? 'border-gray-200 opacity-50 cursor-not-allowed' : 'border-gray-300 hover:bg-gray-50 cursor-pointer'
                    }`;
            }

            function updateButtons() {
                const isEnabled = selectedSizeId && selectedStock > 0 && quantity > 0 && quantity <= selectedStock;

                addToCartBtn.disabled = !isEnabled;
                buyNowBtn.disabled = !isEnabled;

                if (isEnabled) {
                    addToCartBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    buyNowBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    addToCartBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    buyNowBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            // Initialize
            updateHiddenInputs();
            updateButtons();
            updateQuantityControls();
        });
    </script>

    <script>
        const img = document.getElementById('zoomImg');
        const container = img.parentElement;
        const modal = document.getElementById('modal');
        const closeModal = document.getElementById('modalImg');

        // Zoom mengikuti cursor (reverse)
        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            const scale = 2;
            const moveX = -x * 250;
            const moveY = -y * 250;

            img.style.transform = `scale(${scale}) translate(${moveX}px, ${moveY}px)`;
        });

        container.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1) translate(0, 0)';
        });

        // Klik untuk buka modal
        img.addEventListener('click', () => {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            navbar.classList.add('hidden');

        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        })
    </script>

    <style>
        /* Custom Styles */
        .size-btn {
            min-width: 70px;
            transition: all 0.2s ease;
        }

        .size-btn:hover:not([disabled]) {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        #quantity {
            -moz-appearance: textfield;
        }

        #quantity::-webkit-outer-spin-button,
        #quantity::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hover effects for images */
        img:hover {
            opacity: 0.95;
        }
    </style>
</body>

</html>