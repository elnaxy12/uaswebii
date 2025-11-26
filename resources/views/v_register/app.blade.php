<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tab Register | Adidas</title>

    {{-- Js dan Css Link --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="element w-full h-">
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
                                        type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
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
                                        type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label>
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b focus:ring-white/50"
                                        type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
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
                                        type="password" name="password_confirmation" placeholder="Repeat Password" required>
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
    </div>
</body>

</html>