@include('base2.start')

<title>Tab Dashboard | Adidas</title>
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')

    <div id="myDiv" class="fixed inset-0 z-[9999] overflow-auto select-none hidden">
        <div class="flex justify-center items-center h-screen p-4">
            <div class="bg-white w-2xl h-auto border py-5 px-5 relative">
                <button id="hideBtn" class="absolute top-5 right-5 cursor-pointer focus:border" title="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x-icon lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
                <form action="{{ route('user.updateProfile') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Username -->
                    <div>
                        <label class="block font-semibold mb-1">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="w-full p-2 border-b focus:outline-none text-sm" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block font-semibold mb-1">E-mail</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full p-2 border-b focus:outline-none text-sm" required>
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block font-semibold mb-1">No HP</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full p-2 border-b focus:outline-none text-sm">
                    </div>

                    <!-- Province & City -->
                    <div>
                        <label class="block font-semibold mb-1">Province</label>
                        <select name="province_id" id="province_select"
                            class="w-full p-2 border-b focus:outline-none text-sm bg-transparent cursor-pointer">
                            <option value="" disabled class="text-gray-400">Select Province</option>
                        </select>
                        <input type="hidden" name="province_name" id="province_name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">City</label>
                        <select name="city_id" id="city_select"
                            class="w-full p-2 border-b focus:outline-none text-sm bg-transparent cursor-pointer">
                            <option value="" disabled class="text-gray-400">Select City</option>
                        </select>
                        <input type="hidden" name="city_name" id="city_name">
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block font-semibold mb-1">Address</label>
                        <textarea name="address" class="w-full p-2 border focus:outline-none text-xs"
                            rows="3">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <button type="submit"
                        class="bg-black text-white px-4 py-2 cursor-pointer focus:bg-white focus:text-black focus:border-black border-white border-1">
                        Update Profil
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="grid grid-rows-2 md:grid-cols-2 md:grid-rows-1 gap-4 md:w-3xl w-full h-screen">
                @include('base2.sidebar')
                @include('index2.profile')
            </div>
        </div>
    </div>
    @include('base2.end')