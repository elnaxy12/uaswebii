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

<body>
    <div class="w-full bg-[#020617]">
        <canvas id="aurora"></canvas>
        <div class="relative w-full h-screen">
            <div class="absolute" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div
                    class="border md:w-md w-2xs md:h-[500px] h-fit border-white/40 backdrop-blur-3xl bg-inherit rounded-2xl">
                    {{-- head form --}}
                    <div class="flex items-center justify-center md:h-[200px] h-[150px]">
                        <h2 class="text-white font-sans font-semibold md:text-4xl text-3xl select-none cursor-default">
                            Login</h2>
                    </div>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="flex flex-col gap-5 items-center">

                            {{-- Menampilkan error login --}}
                            @if(session('error'))
                                <div
                                    class="text-red-400 text-xs text-center md:w-xs w-[14rem] absolute translate-y-[-35px]">
                                    {{ session('error') }}
                                </div>
                            @endif

                            {{-- email --}}
                            <div>
                                <label>
                                    <input
                                        class="md:w-xs w-[14rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                        required>
                                </label>

                                @error('email')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div>
                                <label>
                                    <input
                                        class="md:w-xs w-[14rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="password" placeholder="Password" name="password" required>
                                </label>

                                @error('password')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- remember me --}}
                            <div class="flex md:justify-start md:w-xs w-[14rem]">
                                <label for="check" class="flex gap-1 cursor-pointer">
                                    <input id="check" class="scale-75 cursor-pointer" type="checkbox" name="remember"
                                        value="1">
                                    <span class="text-white text-xs select-none font-thin m-auto h-full">
                                        Remember me
                                    </span>
                                </label>

                                @error('remember')
                                    <p
                                        class="text-red-400 md:text-xs text-[10px] mt-1 absolute md:translate-y-4 translate-y-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- button login --}}
                            <div>
                                <button
                                    class="bg-white md:w-3xs w-[10rem] md:p-2 p-[4px] rounded-2xl md:mt-5 cursor-pointer">
                                    Login
                                </button>
                            </div>

                            {{-- forgot password --}}
                            <div class="mb-2">
                                <a class="text-white text-xs hover:text-blue-900"
                                    href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="parent fixed flex items-center bottom-0 left-0 w-full bg-white md:h-[60px] h-[70px] pt-2">
                <div class="container mx-auto md:p-0 p-[10px] flex justify-between">
                    <div>
                        <p class="md:text-xs text-[12px] text-blue-900">Welcome to our platform!</p>
                        <p class="md:text-sm text-[12px]">Sign up to unlock all features and enjoy a personalized
                            experience.</p>
                    </div>
                    <div class="flex flex-col md:gap-2 gap-1">
                        <a class="text-xs  hover:text-blue-900" href="/register">Create an acount</a>
                        <button type="submit"
                            class="close-btn hidden md:inline border m-1 p-1 text-xs cursor-pointer hover:bg-black hover:text-white hover:border-black transition-[background-color] duration-200">Close
                            Tab</button>
                    </div>
                </div>
            </div>

            <div class="fixed top-3 left-3 bg-white px-2 py-2">
                <a href="{{ route('welcome') }}">
                    <img src="https://news.adidas.com/dist/images/adidas-news-web.svg" width="100px" alt="Logo Adidas">
                </a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeButtons = document.querySelectorAll('.close-btn');

            closeButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const parent = btn.closest('.parent'); // cari parent terdekat
                    if (parent) {
                        parent.style.display = 'none'; // sembunyikan
                    }
                });
            });
        });
    </script>

    <script src="{{asset('js/aurora.js')}}"></script>
</body>

</html>