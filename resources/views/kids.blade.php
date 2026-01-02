@include('base2.start')

<title>KIDS | Adidas Etalase</title>
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="pt-20">
                <div class="relative flex">
                    <img class="h-screen bg-cover bg-center pb-5"
                        src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/if_w_gt_800,w_800/global_spw_evergreen_always_on_evergreen_ss25_launch_kids_navigation_card_teaser_4_d_95959c8ae5.jpg"
                        alt="">
                    <img class="h-screen bg-cover bg-center pb-5" src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/if_w_gt_800,w_800/global_spw_evergreen_always_on_evergreen_ss25_launch_kids_navigation_card_teaser_3_d_182bcd2166.jpg" alt="">
                    <img class="h-screen bg-cover bg-center pb-5" src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/if_w_gt_800,w_800/global_spw_evergreen_always_on_evergreen_ss25_launch_kids_navigation_card_teaser_6_d_fe64e9738d.jpg" alt="">
                        <div class="absolute bottom-50 left-15 space-y-5">
                        <h1 class="bg-white font-bold px-2">HOLIDAY GIFTING - BEST OF US</h1>
                        <p class="bg-white px-2">Ace your gift-giving game with this
                            <br>seasons best apparel and footwear.
                        </p>
                    </div>
                </div>
                <div class="main-wrapper">
                    <!-- slider-top-kids -->
                    <div id="etalase-kids" class="title-top-men">
                        <p>KID'S SHOES AND CLOTHES</p>
                    </div>
                    <div class="container-slide">
                        <button class="btn-slider btn-prev3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </button>
                        <div id="slider3" class="etalase-slide">
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
                                href="{{ route('product.show', ['id' => $seventeenthProduct->id, 'slug' => $seventeenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="17">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/9fb258a11a25407ab06b52eed1cca37b_9366/Samba_OG_Shoes_Kids_White_IE3675_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$80</p>
                                    <p class="title-product">SAMBA OG SHOES KIDS</p>
                                    <p class="badge-product">ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $eighteenthProduct->id, 'slug' => $eighteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="18">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/2c1a1838d62e4b23b8dddc26793bd47f_9366/Samba_OG_Shoes_Kids_White_JQ2843_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$56</p>
                                    <p class="title-product">SAMBA OG SHOES KIDS</p>
                                    <p class="badge-product">ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $nineteenthProduct->id, 'slug' => $nineteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="19">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/e7e49fce7e54448da09a2983c4fa43d0_9366/Samba_OG_Comfort_Closure_Elastic_Lace_Shoes_Kids_White_JQ3190_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$39</p>
                                    <p class="title-product">SAMBA OG COMFORT CLOSURE ELASTIC LACE SHOES KIDS</p>
                                    <p class="badge-product">ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twentiethProduct->id, 'slug' => $twentiethProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="20">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/80690c33e4d348c58dae6b01ad83e760_9366/Defender_5_Small_Duffel_Bag_Black_JJ7410_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$28</p>
                                    <p class="title-product">DEFENDER 5 SMALL DUFFEL BAG</p>
                                    <p class="badge-product">SPORTSWEAR</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twentyFirstProduct->id, 'slug' => $twentyFirstProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="21">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/27b6e3345f9a4d59a5357e0a4b8a6aa6_9366/Al_Nassr_FC_25-26_Home_Jersey_Kids_Yellow_JN7981_000_plp_model.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$75</p>
                                    <p class="title-product">AL NASR FC 25/26 HOME JERSEY KIDS</p>
                                    <p class="badge-product">PERFORMANCE</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twentySecondProduct->id, 'slug' => $twentySecondProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="22">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/fc50a8f55f56430897757b1d9e2e3231_9366/Argentina_26_Home_Messi_Kids_Jersey_White_KA8115_000_plp_model.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$110</p>
                                    <p class="title-product">ARGENTINA 26 HOME MESSI KIDS JERSEY</p>
                                    <p class="badge-product">PERFORMANCE</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twentyThirdProduct->id, 'slug' => $twentyThirdProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="23">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/09518a69e074496ca06e33bf071d4386_9366/Inter_Miami_CF_25-26_Messi_Away_Jersey_Kids_Black_JI6820_000_plp_model.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$66</p>
                                    <p class="title-product">INTER MIAMI CF 25/26 MESSI AWAY JERSEY KIDS</p>
                                    <p class="badge-product">PERFORMANCE</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twentyFourthProduct->id, 'slug' => $twentyFourthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="24">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/4229e87f23044869a5218fbc64c4fd71_9366/FIFA_World_Cup_26tm_Trionda_Pro_Ball_White_JD8021_HM1.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$170</p>
                                    <p class="title-product">FIFA WORLD CUP 26™ TRIONDA PRO BALL</p>
                                    <p class="badge-product">PERFORMANCE</p>
                                </div>
                            </a>
                        </div>
                        <button class="btn-slider btn-next3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>
                    <div class="progress-bar">
                        <div id="progress3"></div>
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

        // etalase-slide 3
        const slider3 = document.getElementById("slider3");
        const btnPrev3 = document.querySelector(".btn-prev3");
        const btnNext3 = document.querySelector(".btn-next3");
        const progress3 = document.getElementById("progress3");

        let currentIndex3 = 0;
        const slideWidth3 = 290;
        const visibleSlides3 = 4;
        const totalSlides3 = slider3.children.length;
        const maxIndex3 = totalSlides3 - visibleSlides3;

        function updateButtons3() {
            btnPrev3.classList.toggle("hidden", currentIndex3 === 0);
            btnNext3.classList.toggle("hidden", currentIndex3 >= maxIndex3);
        }

        function updateProgress3() {
            let percent = (currentIndex3 / maxIndex3) * 100;
            progress3.style.width = percent + "%";
        }

        btnNext3.addEventListener("click", () => {
            if (currentIndex3 < maxIndex3) {
                currentIndex3++;
                slider3.style.transform = `translateX(${-slideWidth3 * currentIndex3
                    }px)`;
                updateButtons3();
                updateProgress3();
            }
        });

        btnPrev3.addEventListener("click", () => {
            if (currentIndex3 > 0) {
                currentIndex3--;
                slider3.style.transform = `translateX(${-slideWidth3 * currentIndex3
                    }px)`;
                updateButtons3();
                updateProgress3();
            }
        });

        updateButtons3();
        updateProgress3();



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