<div class="md:pt-[14rem] pt-4 pl-5 flex flex-col gap-2 container">
    <h1 class="text-4xl font-sans select-none font-semibold">My Profile</h1>
    <div class="flex flex-col gap-2">
        <h1 class="font-semibold select-none">Account Information</h1>
        <div class="grid w-xs grid-cols-[100px_10px_1fr] gap-y-2 text-sm">
            <p class="font-semibold">Name</p>
            <p>:</p>
            <p>{{ $user->username }}</p>

            <p class="font-semibold">E-mail</p>
            <p>:</p>
            <p>{{ $user->email }}</p>

            <p class="font-semibold">No Hp</p>
            <p>:</p>
            <p>{{ $user->phone }}</p>

            <p class="font-semibold">Address</p>
            <p>:</p>
            <p>{{ $user->address }}</p>
        </div>
    </div>
    <div class="flex justify-end md:w-xl p-2">
        <button id="showBtn"
            class="outline-solid outline-white pt-2 pb-2 pr-4 pl-4 outline-1 bg-black text-white rounded-xs text-xs cursor-pointer focus:bg-white focus:text-black focus:border-black border-white border-1">
            Edit Profil
        </button>
    </div>
</div>

<div id="myDiv" class="fixed inset-0 z-50 overflow-auto select-none hidden">
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

                <!-- Nama -->
                <div>
                    <label class="block font-semibold mb-1">Name</label>
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

<script>
    const showBtn = document.getElementById('showBtn');
    const hideBtn = document.getElementById('hideBtn');
    const myDiv = document.getElementById('myDiv');

    showBtn.addEventListener('click', () => {
        myDiv.classList.remove('hidden');
    });

    hideBtn.addEventListener('click', () => {
        myDiv.classList.add('hidden');
    });
</script>