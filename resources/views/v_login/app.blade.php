<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tab Login</title>

    {{-- Js dan Css Link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="element w-full h-">
        <div class="relative w-full h-screen">
            <div class="absolute" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div
                    class="border md:w-md w-2xs md:h-[500px] h-fit border-white/40 backdrop-blur-3xl bg-inherit rounded-2xl">
                    {{-- head form --}}
                    <div class="flex items-center justify-center md:h-[200px] h-[150px]">
                        <h2 class="text-white font-sans font-semibold md:text-4xl text-3xl select-none cursor-default">
                            Login</h2>
                    </div>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="flex flex-col gap-5 items-center">
                            {{-- email --}}
                            <div>
                                <label for="">
                                    <input
                                        class="md:w-xs w-[14rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="email" placeholder="Email" name="email">
                                </label>
                                @error('email')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div>
                                <label for="">
                                    <input
                                        class="md:w-xs w-[14rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="password" placeholder="Password" name="password"
                                        value="{{ old('username') }}" required>
                                </label>
                                @error('password')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- feriv password --}}
                            <div class="flex md:justify-start md:w-xs w-[14rem]">
                                <label for="check" class="flex gap-1" for="">
                                    <input id="check" class="scale-75 cursor-pointer" type="checkbox" name="remember"
                                        required>
                                    <span class="text-white text-xs select-none cursor-pointer font-thin m-auto h-full">
                                        Remember me
                                    </span>
                                </label>
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
                                <a class="text-white text-xs hover:text-blue-900" href="">Forgot Password?</a>
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
                        <button
                            class="close-btn hidden md:inline border m-1 p-1 text-xs cursor-pointer hover:bg-black hover:text-white hover:border-black transition-[background-color] duration-200">Close
                            Tab</button>
                    </div>
                </div>
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

</body>

</html>