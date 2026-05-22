<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password | Adidas</title>

    <link rel="icon"
        href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18h-5.298a.5.5 0 0 1-.423-.233l-5.535-8.775a.499.499 0 0 1 .175-.701l3.888-2.225a.5.5 0 0 1 .671.167l6.945 11A.5.5 0 0 1 23.5 18zm-5.022-1h4.115l-6.205-9.828-3.02 1.728 5.11 8.1zm-3.463 1H9.721a.502.502 0 0 1-.423-.233L6.23 12.909a.499.499 0 0 1 .175-.701l3.892-2.229a.5.5 0 0 1 .671.167l4.47 7.086a.5.5 0 0 1-.423.768zm-5.019-1h4.112l-3.731-5.915-3.022 1.731L9.996 17zm-3.604 1H1.095a.5.5 0 0 1-.423-.233l-.595-.944a.5.5 0 0 1 .175-.701l3.892-2.224a.5.5 0 0 1 .671.167l2 3.168a.5.5 0 0 1-.423.767zm-5.021-1h4.115l-1.261-1.997-3.023 1.728.169.269z"/></svg>'
        type="image/svg+xml" />

    {{-- Js dan Css Link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
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

<body class="overflow-hidden">
    <div class="w-full bg-[#020617]">
        <canvas id="aurora" class="fixed inset-0 w-full h-full"></canvas>

        {{-- Card --}}
        <div class="relative z-10 flex items-center justify-center min-h-screen pb-[70px] md:pb-[60px] px-4">
            <div
                class="border w-full max-w-sm md:max-w-md border-white/40 backdrop-blur-3xl bg-transparent rounded-2xl">

                {{-- Head --}}
                <div class="flex items-center justify-center py-10 md:py-14">
                    <h2 class="text-white font-sans font-semibold text-3xl md:text-4xl select-none cursor-default">
                        Reset Password
                    </h2>
                </div>

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    @if (session('status'))
                        <div class="flex flex-col items-center justify-center py-8 pb-10 gap-5 px-6">

                            {{-- Check Icon --}}
                            <div
                                class="w-20 h-20 rounded-full border border-white/30 bg-white/10 backdrop-blur-sm flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            {{-- Text --}}
                            <div class="text-center">
                                <p class="text-white font-semibold text-lg">
                                    Email Sent Successfully
                                </p>
                                <p class="text-white/50 text-sm mt-1 max-w-xs">
                                    Please check your inbox and follow the reset link.
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col gap-5 items-center pb-8 px-6">

                            {{-- Email --}}
                            <div class="w-full max-w-xs">
                                <input
                                    class="w-full text-sm p-2 text-white bg-transparent border-b border-white/30 placeholder-white/50 focus:outline-none focus:border-white/70 transition-colors"
                                    type="email" placeholder="Email" name="email" required>
                            </div>

                            {{-- Status --}}
                            @if (session('status'))
                                <p class="text-green-400 text-xs text-center w-full max-w-xs">
                                    {{ session('status') }}
                                </p>
                            @endif

                            {{-- Button --}}
                            <button type="submit"
                                class="w-full max-w-xs bg-white text-black font-medium py-2 px-4 rounded-2xl mt-2 cursor-pointer hover:bg-white/90 transition-colors">
                                Send Email
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="parent fixed bottom-0 left-0 w-full bg-white z-20 h-[70px] md:h-[60px]">
            <div class="container mx-auto h-full px-4 md:px-6 flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-xs text-blue-900 truncate">Welcome to our platform!</p>
                    <p class="text-xs md:text-sm text-gray-700 truncate">Sign up to unlock all features.</p>
                </div>
                <div class="flex flex-col items-center gap-2 flex-shrink-0">
                    <a class="text-xs whitespace-nowrap hover:text-blue-900 transition-colors" href="/register">Create
                        an account</a>
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
                <img src="https://news.adidas.com/dist/images/adidas-news-web.svg" width="90" alt="Logo Adidas">
            </a>
        </div>
    </div>

    {{-- Loader Overlay --}}
    <div id="loaderOverlay" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-2xl p-8">
            <div class="loader"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const overlay = document.getElementById('loaderOverlay');

            form.addEventListener('submit', function () {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            });

            window.addEventListener('pageshow', function (e) {
                if (e.persisted) {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                }
            });

            document.querySelectorAll('.close-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    btn.closest('.parent')?.style && (btn.closest('.parent').style.display = 'none');
                });
            });
        });
    </script>

    <script src="{{ asset('js/aurora.js') }}"></script>
</body>

</html>