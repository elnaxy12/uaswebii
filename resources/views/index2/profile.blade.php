<div class="md:pt-[14rem] pt-4 pl-5 flex flex-col gap-2">
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
        <button
            class="outline-solid outline-white pt-2 pb-2 pr-4 pl-4 outline-1 bg-black text-white rounded-xs text-xs">
            Edit Profil
        </button>
    </div>
</div>