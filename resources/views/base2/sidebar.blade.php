<div class="md:w-3xs w-full h-screen flex items-center">
    <div class="flex w-full flex-col gap-3 mt-10 pl-5">
        <p class="font-bold text-lg font-sans select-none">My Dashboard</p>
        <div class="flex flex-col justify-start gap-1">
            <a href="{{ route('user.dashboard') }}" class="hover:text-black/80 cursor-pointer">Profil</a>
            <a href="{{ route('user.cart') }}" class="hover:text-black/80 cursor-pointer">Cart</a>
            <a href="{{ route('user.wishlists') }}" class="hover:text-black/80 cursor-pointer">Wishlists</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="hover:text-red-950 cursor-pointer">Log Out</button>
            </form>
        </div>
    </div>
</div>