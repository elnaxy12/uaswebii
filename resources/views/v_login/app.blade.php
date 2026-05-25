<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tab Login | Adidas</title>

    <link rel="icon"
        href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18h-5.298a.5.5 0 0 1-.423-.233l-5.535-8.775a.499.499 0 0 1 .175-.701l3.888-2.225a.5.5 0 0 1 .671.167l6.945 11A.5.5 0 0 1 23.5 18zm-5.022-1h4.115l-6.205-9.828-3.02 1.728 5.11 8.1zm-3.463 1H9.721a.502.502 0 0 1-.423-.233L6.23 12.909a.499.499 0 0 1 .175-.701l3.892-2.229a.5.5 0 0 1 .671.167l4.47 7.086a.5.5 0 0 1-.423.768zm-5.019-1h4.112l-3.731-5.915-3.022 1.731L9.996 17zm-3.604 1H1.095a.5.5 0 0 1-.423-.233l-.595-.944a.5.5 0 0 1 .175-.701l3.892-2.224a.5.5 0 0 1 .671.167l2 3.168a.5.5 0 0 1-.423.767zm-5.021-1h4.115l-1.261-1.997-3.023 1.728.169.269z"/></svg>'
        type="image/svg+xml" />

    {{-- Js dan Css Link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-hidden">
    <div class="w-full bg-[#020617] min-h-screen">
        <canvas id="aurora" class="fixed inset-0 w-full h-full"></canvas>

        {{-- Card Login --}}
        <div class="relative z-10 flex items-center justify-center min-h-screen pb-[70px] md:pb-[60px] px-4">
            <div class="border w-full max-w-sm md:max-w-md border-white/40 backdrop-blur-3xl bg-transparent rounded-2xl">

                {{-- Head form --}}
                <div class="flex items-center justify-center py-10 md:py-14">
                    <h2 class="text-white font-sans font-semibold text-3xl md:text-4xl select-none cursor-default">
                        Login
                    </h2>
                </div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-5 items-center pb-8 px-6">

                        {{-- Error login --}}
                        @if(session('error'))
                            <div class="text-red-400 text-xs text-center w-full -mt-3">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Email --}}
                        <div class="w-full max-w-xs">
                            <input
                                class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                type="email" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="w-full max-w-xs relative">
                            <input id="password-input"
                                class="w-full text-sm p-2 pr-8 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                type="password" placeholder="Password" name="password" required>
                            <button type="button" id="toggle-password"
                                class="absolute right-2 top-1/2 -translate-y-1/2 text-white/50 hover:text-white/80 transition-colors cursor-pointer"
                                aria-label="Toggle password visibility">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                            </button>
                            @error('password')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <div class="flex justify-start w-full max-w-xs">
                            <label for="check" class="flex gap-2 cursor-pointer items-center">
                                <input id="check" class="cursor-pointer" type="checkbox" name="remember" value="1">
                                <span class="text-white text-xs select-none font-thin">Remember me</span>
                            </label>
                        </div>

                        {{-- Button login --}}
                        <button type="submit"
                            class="w-full max-w-xs bg-white text-black font-medium py-2 px-4 rounded-2xl mt-2 cursor-pointer hover:bg-white/90 transition-colors">
                            Login
                        </button>

                        {{-- Forgot password --}}
                        <a class="text-white text-xs hover:text-blue-300 transition-colors"
                            href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="parent fixed bottom-0 left-0 w-full bg-white z-20 h-[70px] md:h-[60px]">
            <div class="container mx-auto h-full px-4 md:px-6 flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-xs text-blue-900 truncate">Welcome to our platform!</p>
                    <p class="text-xs md:text-sm text-gray-700 truncate">
                        Sign up to unlock all features.
                    </p>
                </div>
                <div class="flex flex-col items-center gap-2 flex-shrink-0">
                    <a class="text-xs whitespace-nowrap hover:text-blue-900 transition-colors"
                        href="{{ route('register') }}">Create an account</a>
                    <button type="button"
                        class="close-btn hidden md:inline border px-3 py-1 text-xs cursor-pointer hover:bg-black hover:text-white hover:border-black transition-all duration-200">
                        Close Tab
                    </button>
                </div>
            </div>
        </div>

        {{-- Logo --}}
        <div class="fixed top-3 left-3 z-30 bg-white px-2 py-2">
            <a href="{{ route('welcome') }}">
                <img src="https://news.adidas.com/dist/images/adidas-news-web.svg"
                    width="90" alt="Logo Adidas">
            </a>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password-input');
        const toggleBtn = document.getElementById('toggle-password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');

        toggleBtn.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.classList.toggle('hidden', isPassword);
            eyeOffIcon.classList.toggle('hidden', !isPassword);
        });
    </script>

    <script src="{{ asset('js/aurora.js') }}"></script>
</body>

</html>