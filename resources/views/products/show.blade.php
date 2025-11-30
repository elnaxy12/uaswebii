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
    @vite(['resources/css/app.css', 'resources/css/beranda.css'])
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <!-- Product Image -->
            <div class="bg-white p-6">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto">
            </div>

            <!-- Product Info -->
            <div class="bg-white p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <span class="inline-block bg-black text-white px-3 py-1 rounded-full text-sm font-medium mb-4">
                    {{ $product->badge }}
                </span>

                <!-- Price & Stock -->
                <div class="mt-6">
                    <p class="text-4xl font-bold">${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600 mt-2">
                        Stock: <strong class="text-gray-900">{{ $product->stock }}</strong> items available
                    </p>
                </div>

                <!-- Actions -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button class="bg-black text-white hover:bg-black/70  font-semibold py-3 px-6 rounded-lg 
                                  transition duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5.5M7 13l2.5 5.5m0 0L17 21" />
                        </svg>
                        Add to Cart
                    </button>
                    @auth
                        <!-- Jika user login, arahkan ke beranda -->
                        <a href="{{ route('beranda') }}"
                            class="border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-6 
                                              rounded-lg transition duration-200 flex items-center justify-center gap-2 no-underline">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Beranda
                        </a>
                    @else
                        <!-- Jika user belum login, arahkan ke home -->
                        <a href="{{ url('/') }}"
                            class="border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-6 
                                              rounded-lg transition duration-200 flex items-center justify-center gap-2 no-underline">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Home
                        </a>
                    @endauth
                </div>

                <!-- Product Details -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Product Details</h4>
                    <ul class="grid grid-cols-2 gap-4">
                        <li>
                            <strong class="text-gray-700 text-sm font-medium">Slug:</strong>
                            <span class="text-gray-600 mt-1">{{ $product->slug }}</span>
                        </li>
                        <li>
                            <strong class="text-gray-700 text-sm font-medium">Category:</strong>
                            <span class="text-gray-600 mt-1">{{ $product->etalase_id }}</span>
                        </li>
                        <li>
                            <strong class="text-gray-700 text-sm font-medium">Added:</strong>
                            <span class="text-gray-600 mt-1">{{ $product->created_at->format('M d, Y') }}</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    @include('base2.end')
</body>
</html>