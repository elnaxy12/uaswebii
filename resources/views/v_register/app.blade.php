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

<body>
    <div class="w-full bg-[#020617]">
        <canvas id="aurora"></canvas>
        <div class="relative w-full h-screen">
            <div class="absolute" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div
                    class="border md:w-md w-2xs md:h-[550px] h-fit border-white/40 backdrop-blur-3xl bg-inherit rounded-2xl">
                    {{-- head form --}}
                    <div class="flex items-center justify-center md:h-[200px] h-[150px]">
                        <h2 class="text-white font-sans font-semibold md:text-4xl text-3xl select-none cursor-default">
                            Register</h2>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="flex flex-col gap-5 items-center">
                            {{-- first name & last name --}}
                            <div class="flex gap-2">
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="first_name" placeholder="First Name"
                                        value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="last_name" placeholder="Last Name"
                                        value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                            {{-- email & username --}}
                            <div class="flex gap-2">
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="username" placeholder="Username" value="{{ old('username') }}"
                                        required>
                                    @error('username')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                            {{-- password --}}
                            <div class="flex gap-2">
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="password" name="password" placeholder="Create Password" required>
                                    @error('password')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="password" name="password_confirmation" placeholder="Repeat Password"
                                        required>
                                </label>
                            </div>

                            {{-- address & phone (optional) --}}
                            <div class="flex gap-2">
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                </label>
                            </div>

                            {{-- button register --}}
                            <div>
                                <button type="submit"
                                    class="bg-white md:w-3xs w-[10rem] md:p-2 p-[4px] rounded-2xl md:mt-5 cursor-pointer hover:bg-gray-200 transition duration-200">
                                    Register
                                </button>
                            </div>

                            {{-- have account --}}
                            <div class="mb-2">
                                <a class="text-white text-xs hover:text-blue-900" href="/login">Have an Account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="fixed top-3 left-3 bg-white px-2 py-2">
            <a href="{{ route('welcome') }}">
                <img src="https://news.adidas.com/dist/images/adidas-news-web.svg" width="100px" alt="Logo Adidas">
            </a>
        </div>
    </div>

    <script src="{{ asset('js/aurora.js') }}"></script>
</body>

</html>