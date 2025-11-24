<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tab Register</title>

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

                    <form action="">
                        <div class="flex flex-col gap-5 items-center">
                            {{-- first name --}}
                            <div class="flex gap-2">
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="text" placeholder="First Name">
                                </label>
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="text" placeholder="Last Name">
                                </label>
                            </div>
                            <div class="flex gap-2">
                                {{-- email --}}
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="email" placeholder="Email">
                                </label>
                                {{-- address --}}
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="text" placeholder="Address">
                                </label>
                            </div>
                            {{-- password --}}
                            <div class="flex gap-2">
                                {{-- email --}}
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="password" placeholder="Create Password">
                                </label>
                                {{-- address --}}
                                <label for="">
                                    <input
                                        class="md:w-[10rem] w-[7rem] md:text-sm text-xs p-2 text-white placeholder-white/50 focus:outline-none border-b  focus:ring-white/50"
                                        type="password" placeholder="Repeat Password">
                                </label>
                            </div>
                            {{-- feriv password --}}
                            <div class="flex md:justify-start md:w-xs w-[14rem]">
                                <label for="check" class="flex gap-1" for="">
                                    <input id="check" class="scale-75 cursor-pointer" type="checkbox">
                                    <span class="text-white text-xs select-none cursor-pointer font-thin m-auto h-full">
                                        Remember me
                                    </span>
                                </label>
                            </div>
                            {{-- button login --}}
                            <div>
                                <button
                                    class="bg-white md:w-3xs w-[10rem] md:p-2 p-[4px] rounded-2xl md:mt-5 cursor-pointer">
                                    Register
                                </button>
                            </div>
                            {{-- have acount --}}
                            <div class="mb-2">
                                <a class="text-white text-xs hover:text-blue-900" href="/login">Have an Acount?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>