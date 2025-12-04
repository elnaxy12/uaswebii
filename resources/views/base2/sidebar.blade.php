<div class="md:pt-[12rem] pt-[4rem] w-3xs">
    <div class="flex w-full flex-col gap-3 mt-10 pl-5">
        <p class="font-bold text-lg font-sans select-none">My Dashboard</p>
        <div class="flex flex-col justify-start gap-1">
            <a href="{{ route('user.dashboard') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black focus:border-b-black border-b-white border-b-1 cursor-pointer">Profil</a>
            <a href="{{ route('user.order') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black focus:border-b-black border-b-white border-b-1 cursor-pointer">My Order</a>
            <a href="{{ route('user.cart') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black focus:border-b-black border-b-white border-b-1 cursor-pointer">Cart</a>
            <a href="{{ route('user.wishlists') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black focus:border-b-black border-b-white border-b-1 cursor-pointer">Wishlists</a>
            <form action="{{ route('logout') }}" method="POST" class="text-red-600 transition-all duration-100 hover:text-red-600/80 cursor-pointer hover:border-b-red-600 focus:border-b-red-600 hover:border-b-1 focus:border-b-1">
                @csrf
                <button class="cursor-pointer">Log Out</button>
            </form>
        </div>
    </div>
</div>