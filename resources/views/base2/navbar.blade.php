<div id="navbar" class="full-navbar">
    <div class="col1 hidden! md:flex!">
        <p class="id">&#127470;&#127465;</p>
        <p class="ads">"Style meets savings—shop the latest collection now!"</p>
    </div>
    <div class="col2">
        <div class="col1 md:justify-start! justify-center! w-full! md:ml-4! ml-0!">
            <a id="backToTop" href="{{ auth()->check() ? route('beranda') : route('welcome') }}">Adidas</a>
        </div>
        <div id="navMenu" class="col2">
            <div id="menuToggle" class="col4">
                <button id="btnToggle" class="loader-btn"></button>
            </div>
            <a href="https://www.adidas.com/us/men" target="_blank" rel="noopener noreferrer">MEN</a>
            <a href="https://www.adidas.com/us/women" target="_blank" rel="noopener noreferrer">WOMAN</a>
            <a href="https://www.adidas.com/us/kids" target="_blank" rel="noopener noreferrer">KIDS</a>
            <a href="https://www.adidas.com/us/back_to_school" target="_blank" rel="noopener noreferrer">BACK TO
                SCHOOL</a>
            <a href="https://www.adidas.com/us/sale" target="_blank" rel="noopener noreferrer">SALE</a>
            <a href="https://www.adidas.com/us/new_arrivals" target="_blank" rel="noopener noreferrer">NEW &
                TRENDING</a>
        </div>
        {{-- <div class="col3">
            <a href="{{ route('user.dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user-icon lucide-user">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </a>
            <a href="{{{ route('user.wishlists') }}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-heart-icon lucide-heart">
                    <path
                        d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                </svg>
            </a>
            <a href="{{{ route('user.cart') }}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-baggage-claim-icon lucide-baggage-claim">
                    <path d="M22 18H6a2 2 0 0 1-2-2V7a2 2 0 0 0-2-2" />
                    <path d="M17 14V4a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v10" />
                    <rect width="13" height="8" x="8" y="6" rx="1" />
                    <circle cx="18" cy="20" r="2" />
                    <circle cx="9" cy="20" r="2" />
                </svg>
            </a>
        </div> --}}
    </div>
</div>