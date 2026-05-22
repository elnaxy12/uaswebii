<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tab Register | Adidas</title>

    <link rel="icon"
        href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18h-5.298a.5.5 0 0 1-.423-.233l-5.535-8.775a.499.499 0 0 1 .175-.701l3.888-2.225a.5.5 0 0 1 .671.167l6.945 11A.5.5 0 0 1 23.5 18zm-5.022-1h4.115l-6.205-9.828-3.02 1.728 5.11 8.1zm-3.463 1H9.721a.502.502 0 0 1-.423-.233L6.23 12.909a.499.499 0 0 1 .175-.701l3.892-2.229a.5.5 0 0 1 .671.167l4.47 7.086a.5.5 0 0 1-.423.768zm-5.019-1h4.112l-3.731-5.915-3.022 1.731L9.996 17zm-3.604 1H1.095a.5.5 0 0 1-.423-.233l-.595-.944a.5.5 0 0 1 .175-.701l3.892-2.224a.5.5 0 0 1 .671.167l2 3.168a.5.5 0 0 1-.423.767zm-5.021-1h4.115l-1.261-1.997-3.023 1.728.169.269z"/></svg>'
        type="image/svg+xml" />

    {{-- Js dan Css Link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-hidden">
    <div class="w-full bg-[#020617]">
        <canvas id="aurora" class="fixed inset-0 w-full h-full"></canvas>

        {{-- Card Register --}}
        <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
            <div
                class="border w-full max-w-sm md:max-w-md border-white/40 backdrop-blur-3xl bg-transparent rounded-2xl">

                {{-- Head --}}
                <div class="flex items-center justify-center py-10 md:py-14">
                    <h2 class="text-white font-sans font-semibold text-3xl md:text-4xl select-none cursor-default">
                        Register
                    </h2>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-5 items-center pb-8 px-6">

                        {{-- Errors --}}
                        @if ($errors->any())
                            <div
                                class="bg-red-500/10 border border-red-500/50 text-red-400 text-xs p-3 rounded-md w-full max-w-xs">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- First & Last Name --}}
                        <div class="flex gap-3 w-full max-w-xs">
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="text" name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') }}" required>
                            </div>
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Email & Username --}}
                        <div class="flex gap-3 w-full max-w-xs">
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="text" name="username" placeholder="Username" value="{{ old('username') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="flex gap-3 w-full max-w-xs">
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="password" name="password_confirmation" placeholder="Confirm" required>
                            </div>
                        </div>

                        {{-- Province & City --}}
                        <div class="flex gap-3 w-full max-w-xs">
                            <div class="flex-1 relative">
                                <select name="province_id" id="province_select"
                                    class="w-full text-sm p-2 text-white/50 bg-transparent border-b border-white/30 focus:outline-none focus:text-white cursor-pointer transition-colors disabled:opacity-40 appearance-none"
                                    disabled>
                                    <option value="" disabled selected class="bg-gray-900">Province</option>
                                </select>
                                <input type="hidden" name="province_name" id="province_name">

                                <!-- Spinner Province -->
                                <div id="province_loading" class="absolute right-2 top-1/2 -translate-y-1/2">
                                    <div
                                        class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin">
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1 relative">
                                <select name="city_id" id="city_select" disabled
                                    class="w-full text-sm p-2 text-white/50 bg-transparent border-b border-white/30 focus:outline-none focus:text-white cursor-pointer transition-colors disabled:opacity-40 appearance-none">
                                    <option value="" disabled selected class="bg-gray-900">City</option>
                                </select>

                                <!-- Spinner -->
                                <div id="city_loading" class="hidden absolute right-2 top-1/2 -translate-y-1/2">
                                    <div
                                        class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Address & Phone --}}
                        <div class="flex gap-3 w-full max-w-xs">
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="flex-1">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        {{-- Button Register --}}
                        <button type="submit"
                            class="w-full max-w-xs bg-white text-black font-medium py-2 px-4 rounded-2xl mt-2 cursor-pointer hover:bg-white/90 transition-colors">
                            Register
                        </button>

                        {{-- Have account --}}
                        <a class="text-white text-xs hover:text-blue-300 transition-colors mb-2" href="/login">Have an
                            Account?</a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Logo --}}
        <div class="fixed top-3 left-3 z-30 bg-white px-2 py-2">
            <a href="{{ route('welcome') }}">
                <img src="https://news.adidas.com/dist/images/adidas-news-web.svg" width="90" alt="Logo Adidas">
            </a>
        </div>
    </div>

    {{-- Scripts tetap sama --}}
    <script>
        fetch('/api/provinces')
            .then(res => res.json())
            .then(data => {
                const select = document.getElementById('province_select');
                const provinceLoading = document.getElementById('province_loading');

                data.data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    option.className = 'text-black bg-white';
                    select.appendChild(option);
                });

                // Setelah data masuk, aktifkan dan munculin arrow
                select.classList.remove('appearance-none');
                select.disabled = false;
                provinceLoading.classList.add('hidden');
            });

        const citySelect = document.getElementById('city_select');
        const cityLoading = document.getElementById('city_loading');


        document.getElementById('province_select').addEventListener('change', function () {

            const provinceId = this.value;

            document.getElementById('province_name').value =
                this.options[this.selectedIndex].textContent;

            citySelect.innerHTML =
                '<option value="" disabled selected class="bg-gray-900">City</option>';

            citySelect.disabled = true;

            // hide arrow pas loading
            citySelect.classList.add('appearance-none');

            cityLoading.classList.remove('hidden');

            fetch(`/api/cities/${provinceId}`)
                .then(res => res.json())
                .then(data => {

                    citySelect.innerHTML =
                        '<option value="" disabled selected class="bg-gray-900">City</option>';

                    data.data.forEach(city => {

                        const option = document.createElement('option');

                        option.value = city.id;
                        option.textContent = city.name;
                        option.className = 'text-black bg-white';

                        citySelect.appendChild(option);
                    });

                    // munculin arrow lagi
                    citySelect.classList.remove('appearance-none');

                    citySelect.disabled = false;

                    cityLoading.classList.add('hidden');
                });
        });

        citySelect.addEventListener('change', function () {
            document.getElementById('city_name').value = this.options[this.selectedIndex].textContent;
        });
    </script>
    <script src="{{ asset('js/aurora.js') }}"></script>
</body>

</html>