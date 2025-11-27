<div class="md:w-3xs w-full h-screen flex items-center">
    <div class="flex w-full flex-col gap-3 mt-10 pl-5">
        <p class="font-bold text-lg font-sans select-none">My Dashboard</p>
        <div class="flex flex-col justify-start gap-1">
            <a href="#user-profile" class="hover:text-black/80 cursor-pointer">Profil</a>
            <a class="hover:text-black/80 cursor-pointer" href="">Cart</a>
            <a class="hover:text-black/80 cursor-pointer" href="">Wishlists</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="hover:text-red-950 cursor-pointer">Log Out</button>
            </form>
        </div>
    </div>
</div>