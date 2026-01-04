@include('base2.start')

<title>MEN | Adidas Etalase</title>
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="pt-20">
                <div class="relative">
                    <img class="h-screen bg-cover bg-center pb-5"
                        src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/edi_fw25_whattowearskiing_bnr_d_802a390831.jpg"
                        alt="">
                    <div class="absolute bottom-50 left-15 space-y-5">
                        <h1 class="bg-white font-bold px-2">HOLIDAY GIFTING - BEST OF US</h1>
                        <p class="bg-white px-2">Ace your gift-giving game with this
                            <br>seasons best apparel and footwear.
                        </p>
                    </div>
                </div>
                <div class="main-wrapper">
                    <div id="etalase-men" class="title-top-men">
                        <p>TOP MEN FOR YOU</p>
                    </div>
                    <!--slider-etalase-top-men-->
                    <div class="container-slide">
                        <button class="btn-slider btn-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </button>

                        <div id="slider" class="etalase-slide no-underline">
                            @php
                                $firstProduct = $products->get(0);
                                $secondProduct = $products->get(1);
                                $thirdProduct = $products->get(2);
                                $fourthProduct = $products->get(3);
                                $fifthProduct = $products->get(4);
                                $sixthProduct = $products->get(5);
                                $seventhProduct = $products->get(6);
                                $eighthProduct = $products->get(7);
                                $ninthProduct = $products->get(8);
                                $tenthProduct = $products->get(9);
                                $eleventhProduct = $products->get(10);
                                $twelfthProduct = $products->get(11);
                                $thirteenthProduct = $products->get(12);
                                $fourteenthProduct = $products->get(13);
                                $fifteenthProduct = $products->get(14);
                                $sixteenthProduct = $products->get(15);
                                $seventeenthProduct = $products->get(16);
                                $eighteenthProduct = $products->get(17);
                                $nineteenthProduct = $products->get(18);
                                $twentiethProduct = $products->get(19);
                                $twentyFirstProduct = $products->get(20);
                                $twentySecondProduct = $products->get(21);
                                $twentyThirdProduct = $products->get(22);
                                $twentyFourthProduct = $products->get(23);
                            @endphp

                            <a
                                href="{{ route('product.show', ['id' => $firstProduct->id, 'slug' => $firstProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="1">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/606f418a01a14c419ac35e7c84a5e2d2_9366/Samba_OG_Shoes_Brown_JR0891_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">MEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $secondProduct->id, 'slug' => $secondProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="2">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/9da93feaffd84fa5baf15e0b9727687a_9366/Swift_Run_1.0_Shoes_Grey_JR6898_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$60</p>
                                    <p class="title-product">SWIFT RUN 1.0 SHOES</p>
                                    <p class="badge-product">MEN'S SPORTSWEAR</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $thirdProduct->id, 'slug' => $thirdProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="3">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/e694f6e9261b48d6b255ca8a1388d3d5_9366/ULTRABOOST_1.0_SHOES_White_JR1987_HM1.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$135</p>
                                    <p class="title-product">ULTRABOOST 1.0 SHOES</p>
                                    <p class="badge-product">MEN'S SPORTSWEAR</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $fourthProduct->id, 'slug' => $fourthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="4">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/911ec048adc4471f938af50867c2ad85_9366/Gazelle_Indoor_Shoes_Red_JI2063_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$120</p>
                                    <p class="title-product">GAZELLA INDOOR SHOES</p>
                                    <p class="badge-product">MEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $fifthProduct->id, 'slug' => $fifthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="5">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/ed03f2b031b04884a8481cec1ccca4e2_9366/Adizero_EVO_SL_Shoes_Black_JP7149_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$150</p>
                                    <p class="title-product">ADIZERO EVO SL SHOES</p>
                                    <p class="badge-product">PERFORMANCE</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $sixthProduct->id, 'slug' => $sixthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="6">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/ee99b4b9bde74f30a933a8bf011911ae_9366/Samba_OG_Shoes_Black_B75807_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">MEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $seventhProduct->id, 'slug' => $seventhProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="7">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/f0ca2dd8bdb84a2ab11faacb8802c4dc_9366/Ultraboost_1.0_Shoes_White_HQ4202_HM1.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$135</p>
                                    <p class="title-product">ULTRABOOST 1.0 SHOES</p>
                                    <p class="badge-product">MEN'S SPORTSWEAR</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $eighthProduct->id, 'slug' => $eighthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="8">
                                                <button class="appreciate">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        tabindex="0" class="lucide lucide-heart-icon lucide-heart">
                                                        <path
                                                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endforeach
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/507b9464089e4c818536b4613435aebf_9366/Samba_OG_Shoes_Blue_ID2056_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">MEN'S ORIGINALS</p>
                                </div>
                            </a>
                        </div>
                        <button class="btn-slider btn-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>
                    <div class="progress-bar">
                        <div id="progress"></div>
                    </div>
                </div>
                <div class="relative">
                    <img class="w-full bg-cover bg-center pt-5"
                        src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/if_w_gt_1920,w_1920/global_adizero_race_running_ss26_launch_glps_family_banner_hero_1_d_c94edd63e8.jpg"
                        alt="">
                    <div class="absolute bottom-20 left-15 space-y-5">
                        <h1 class="bg-white font-bold px-2">FASTER. FASTEST. ADIZERO</h1>
                        <p class="bg-white px-2">Beat your fastest records, from training to competition.</p>
                        <a
                            href="{{ route('product.show', ['id' => $fifthProduct->id, 'slug' => $fifthProduct->slug]) }}">
                            <button
                                class="bg-white border py-2 px-5 cursor-pointer focus:bg-black focus:border focus:border-white focus:text-white">
                                Buy Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <footer>
                <div class="footer-content">
                    <p>`Adidas &copy; 2025 | adidas America, Inc.</p>
                </div>
            </footer>
        </div>
    </div>
    <script>
        // ================
        // etalase-slide
        // ================

        // etalase-slide 1
        const slider = document.getElementById("slider");
        const btnPrev = document.querySelector(".btn-prev");
        const btnNext = document.querySelector(".btn-next");
        const progress = document.getElementById("progress");

        let currentIndex = 0;
        const slideWidth = 290;
        const visibleSlides = 4;
        const totalSlides = slider.children.length;
        const maxIndex = totalSlides - visibleSlides;

        function updateButtons() {
            btnPrev.classList.toggle("hidden", currentIndex === 0);
            btnNext.classList.toggle("hidden", currentIndex >= maxIndex);
        }

        function updateProgress() {
            let percent = (currentIndex / maxIndex) * 100;
            progress.style.width = percent + "%";
        }

        btnNext.addEventListener("click", () => {
            if (currentIndex < maxIndex) {
                currentIndex++;
                slider.style.transform = `translateX(${-slideWidth * currentIndex
                    }px)`;
                updateButtons();
                updateProgress();
            }
        });

        btnPrev.addEventListener("click", () => {
            if (currentIndex > 0) {
                currentIndex--;
                slider.style.transform = `translateX(${-slideWidth * currentIndex
                    }px)`;
                updateButtons();
                updateProgress();
            }
        });

        updateButtons();
        updateProgress();



        //

        // ===================================
        // navigasi menu and toggle (mobile)
        // ===================================

        const btn = document.getElementById("btnToggle");
        const menuToggle = document.getElementById("menuToggle");
        const navMenu = document.getElementById("navMenu");
        const body = document.body;
        let isActive = false;

        let scrollPosition = 0;

        btn.addEventListener("click", () => {
            if (!isActive) {
                scrollPosition = window.scrollY;
                btn.classList.add("active");
                setTimeout(() => btn.classList.add("active2"), 500);

                navMenu.classList.add("active");
                menuToggle.classList.add("active");

                body.style.top = `-${scrollPosition}px`;
                body.classList.add("menu-open");

                isActive = true;
            } else {
                btn.classList.remove("active2");
                setTimeout(() => btn.classList.remove("active"), 500);

                navMenu.classList.remove("active");
                menuToggle.classList.remove("active");

                body.classList.remove("menu-open");
                body.style.top = "";
                window.scrollTo(0, scrollPosition);

                isActive = false;
            }
        });

        //

        // =============================================
        // onclick pada element div ke tab baru/blank
        // =============================================

        document.querySelectorAll(".slide").forEach((slide) => {
            slide.addEventListener("click", () => {
                const link = slide.dataset.link;
                if (link) {
                    window.open(link, "_blank", "noopener,noreferrer");
                }
            });
        });

    </script>
    @include('base2.end')