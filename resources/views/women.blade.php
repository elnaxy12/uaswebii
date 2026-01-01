@include('base2.start')

<title>WOMEN | Adidas Etalase</title>
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
                    <!--slider-top-women-->
                    <div id="etalase-woman" class="title-top-men">
                        <p>BEST WOMEN FOR YOU</p>
                    </div>
                    <div class="container-slide">
                        <button class="btn-slider btn-prev2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </button>
                        <div id="slider2" class="etalase-slide no-underline">
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
                                href="{{ route('product.show', ['id' => $ninthProduct->id, 'slug' => $ninthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="9">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/49d73d8eaccb48ee89ee3feb82ce098c_9366/Samba_OG_shoes_Black_JI2734_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$110</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $tenthProduct->id, 'slug' => $tenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="10">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/6fb12406f5684eeea66762a868b73731_9366/SL_72_OG_Shoes_Brown_JI0189_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$110</p>
                                    <p class="title-product">SL 72 OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $eleventhProduct->id, 'slug' => $eleventhProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="11">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/24ec18f0e35e491d8be5b38c9f09c11b_9366/SL_72_OG_Shoes_Brown_JS3981_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SL 72 OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $twelfthProduct->id, 'slug' => $twelfthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="12">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/ad3d6d029e414c1ba24603629de60f5e_9366/Cow_Print_Samba_Long_Tongue_Shoes_White_JS3931_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$130</p>
                                    <p class="title-product">COW PRINT SAMBA LONG TONGUE SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $thirteenthProduct->id, 'slug' => $thirteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="13">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/3f97a71da3ae4cb98250122966491184_9366/Samba_OG_Shoes_White_IG9030_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $fourteenthProduct->id, 'slug' => $fourteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="14">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/1f525b85b19a4eda86742e0f46413bcf_9366/Samba_Long_Tongue_Shoes_White_JR5998_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$120</p>
                                    <p class="title-product">SAMBA LONG TONGUE SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $fifteenthProduct->id, 'slug' => $fifteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="15">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/89282cea6ef8495caff848b041a0a3ce_9366/Samba_OG_Shoes_Black_IE5836_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('product.show', ['id' => $sixteenthProduct->id, 'slug' => $sixteenthProduct->slug]) }}">
                                <div class="slide">
                                    <div class="prototype">
                                        @foreach ($products as $product)
                                            <form action="{{ route('wishlists.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="16">
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
                                        <img src="https://assets.adidas.com/images/w_600,f_auto,q_auto/b668a22ed8ee475e87beafeeedb96657_9366/Samba_OG_Shoes_Silver_JR0035_00_plp_standard.jpg"
                                            alt="" />
                                    </div>
                                    <p class="price">$100</p>
                                    <p class="title-product">SAMBA OG SHOES</p>
                                    <p class="badge-product">WOMEN'S ORIGINALS</p>
                                </div>
                            </a>
                        </div>
                        <button class="btn-slider btn-next2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>
                    <div class="progress-bar">
                        <div id="progress2"></div>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-screen bg-cover bg-center pt-5"
                        src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto:best,fl_lossy/if_w_gt_1920,w_1920/6508630_CAM_Onsite_FW_25_YGT_SEA_Games_6_Dec_SEA_Masthead_Banner_ref02_2880_X1280px_desktop_D_78f7a7b8ee.jpg"
                        alt="">
                    <div class="absolute bottom-20 left-15 space-y-5">
                        <h1 class="bg-white font-bold px-2">You Got This</h1>
                        <p class="bg-white px-2">We all need someone to reassure us
                        </p>
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

        // etalase-slide 2
        const slider2 = document.getElementById("slider2");
        const btnPrev2 = document.querySelector(".btn-prev2");
        const btnNext2 = document.querySelector(".btn-next2");
        const progress2 = document.getElementById("progress2");

        let currentIndex2 = 0;
        const slideWidth2 = 290;
        const visibleSlides2 = 4;
        const totalSlides2 = slider2.children.length;
        const maxIndex2 = totalSlides2 - visibleSlides2;

        function updateButtons2() {
            btnPrev2.classList.toggle("hidden", currentIndex2 === 0);
            btnNext2.classList.toggle("hidden", currentIndex2 >= maxIndex2);
        }

        function updateProgress2() {
            let percent = (currentIndex2 / maxIndex2) * 100;
            progress2.style.width = percent + "%";
        }

        btnNext2.addEventListener("click", () => {
            if (currentIndex2 < maxIndex2) {
                currentIndex2++;
                slider2.style.transform = `translateX(${-slideWidth2 * currentIndex2
                    }px)`;
                updateButtons2();
                updateProgress2();
            }
        });

        btnPrev2.addEventListener("click", () => {
            if (currentIndex2 > 0) {
                currentIndex2--;
                slider2.style.transform = `translateX(${-slideWidth2 * currentIndex2
                    }px)`;
                updateButtons2();
                updateProgress2();
            }
        });

        updateButtons2();
        updateProgress2();



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