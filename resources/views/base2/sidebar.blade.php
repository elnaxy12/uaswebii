<div class="md:pt-[12rem] pt-[4rem] w-3xs md:h-screen">
    <div class="flex w-full flex-col gap-3 mt-10 pl-5">
        <div class="flex flex-col justify-start gap-1">
            <a href="{{ route('user.dashboard') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black hover:bg-gray-100 focus:border-b-black border-b-white border-b-1 cursor-pointer">Profil</a>
            <a href="{{ route('user.order') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black hover:bg-gray-100 focus:border-b-black border-b-white border-b-1 cursor-pointer">Order</a>
            <a href="{{ route('user.cart') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black hover:bg-gray-100 focus:border-b-black border-b-white border-b-1 cursor-pointer">Cart</a>
            <a href="{{ route('user.wishlists') }}" class="hover:text-black/80! transition-all duration-100 hover:border-b-black hover:bg-gray-100 focus:border-b-black border-b-white border-b-1 cursor-pointer">Wishlists</a>
            <form action="{{ route('logout') }}" method="POST" class="text-red-600 transition-all duration-100 hover:text-red-600/80 hover:bg-gray-100 cursor-pointer hover:border-b-red-600 border-b-white border-b-1 hover:border-b-1 focus:border-b-red-600 focus:border-b-1">
                @csrf
                <button class="cursor-pointer">Log Out</button>
            </form>
        </div>
    </div>
</div>
<div class="fixed hidden md:block bottom-0 left-0">
    <img src="https://preview.thenewsmarket.com/Previews/ADID/StillAssets/1920x1440/689347.jpg" width="120">
</div>