<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adidas Etalase</title>
    @vite (['resources/css/beranda.css', 'resources/js/scrollsmooth.js',])

    <link rel="icon"
        href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 18h-5.298a.5.5 0 0 1-.423-.233l-5.535-8.775a.499.499 0 0 1 .175-.701l3.888-2.225a.5.5 0 0 1 .671.167l6.945 11A.5.5 0 0 1 23.5 18zm-5.022-1h4.115l-6.205-9.828-3.02 1.728 5.11 8.1zm-3.463 1H9.721a.502.502 0 0 1-.423-.233L6.23 12.909a.499.499 0 0 1 .175-.701l3.892-2.229a.5.5 0 0 1 .671.167l4.47 7.086a.5.5 0 0 1-.423.768zm-5.019-1h4.112l-3.731-5.915-3.022 1.731L9.996 17zm-3.604 1H1.095a.5.5 0 0 1-.423-.233l-.595-.944a.5.5 0 0 1 .175-.701l3.892-2.224a.5.5 0 0 1 .671.167l2 3.168a.5.5 0 0 1-.423.767zm-5.021-1h4.115l-1.261-1.997-3.023 1.728.169.269z"/></svg>'
        type="image/svg+xml" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400..700&family=Comic+Relief:wght@400;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=TASA+Explorer:wght@400..800&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400..700&family=Comic+Relief:wght@400;700&family=Dancing+Script:wght@400..700&family=Dongle&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Rock+3D&family=TASA+Explorer:wght@400..800&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />
</head>

<body id="overlay" class="fadeIn">
    <div id="navbar" class="full-navbar">
        <div class="col1">
            <p class="id">&#127470;&#127465;</p>
            <p class="ads">"Style meets savings—shop the latest collection now!"</p>
        </div>
        <div class="col2">
            <div class="col1">
                <a id="backToTop">`Adidas</a>
            </div>
            <div id="navMenu" class="col2">
                <div id="menuToggle" class="col4">
                    <button id="btnToggle" class="loader-btn"></button>
                </div>
                <a href="{{route('men')}}" target="_blank" rel="noopener noreferrer">MEN</a>
                <a href="{{route('women')}}" target="_blank" rel="noopener noreferrer">WOMAN</a>
                <a href="{{route('kids')}}" target="_blank" rel="noopener noreferrer">KIDS</a>
                <p href="https://www.adidas.com/us/back_to_school" target="_blank" rel="noopener noreferrer">BACK TO
                    SCHOOL</p>
                <p href="https://www.adidas.com/us/sale" target="_blank" rel="noopener noreferrer">SALE</p>
                <p href="https://www.adidas.com/us/new_arrivals" target="_blank" rel="noopener noreferrer">NEW &
                    TRENDING</p>
            </div>
            <div class="col3">
                <a href="{{ route('user.dashboard') }}" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user-icon lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </a>
                <a href="{{{ route('user.wishlists') }}}" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-heart-icon lucide-heart">
                        <path
                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                    </svg>
                </a>
                <a href="{{{ route('user.cart') }}}" target="_blank" rel="noreferrer">
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
            </div>
        </div>
    </div>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="full-banner">
                <div class="banner">
                    <div class="main-wrapper">
                        <div class="col1">
                            <p>WE ARE SO BACK</p>
                            <p style="font-weight: 100">
                                Set the tone this school year with timeless adidas apparel and
                                footwear.
                            </p>
                        </div>
                        <div class="col2">
                            <a href="#etalase-men" class="btn-link">
                                SHOP MEN
                            </a>
                            <a href="#etalase-woman" class="btn-link">
                                SHOP WOMEN
                            </a>

                            <a href="#etalase-kids" class="btn-link">
                                SHOP KIDS
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--desk1-->
            <div class="main-wrapper">
                <div class="container-desk1">
                    <h2>MEN'S SNEAKERS AND WORKOUT CLOTHES</h2>
                    <p>
                        Attention, athletes and creators. Stand tall, stand proud and perform
                        your best in men's shoes and apparel that support your passion and
                        define your style. adidas takes fitness and comfort seriously. Workout
                        with cutting-edge cushioning, or set the casual standard off the field
                        with heritage sports style. adidas is here, and has always been, with
                        men's workout clothes and sneakers for dreamers, athletes and everyday
                        wear. Gear up with our best-in-class activewear that fits and feels as
                        great as it looks. Experience the adidas difference.
                    </p>
                </div>
            </div>

            <!--slider-etalase-product-->
            <div class="main-wrapper">
                <div id="etalase-men" class="title-top-men">
                    <p>TOP MEN FOR YOU</p>
                </div>
                <!--slider-etalase-top-men-->
                <div class="container-slide">
                    <button class="btn-slider btn-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-left-icon lucide-chevron-left">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right-icon lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
                <div class="progress-bar">
                    <div id="progress"></div>
                </div>

                <!--slider-top-women-->
                <div id="etalase-woman" class="title-top-men">
                    <p>BEST WOMEN FOR YOU</p>
                </div>
                <div class="container-slide">
                    <button class="btn-slider btn-prev2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-left-icon lucide-chevron-left">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>
                    <div id="slider2" class="etalase-slide no-underline">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right-icon lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
                <div class="progress-bar">
                    <div id="progress2"></div>
                </div>

                <!-- slider-top-kids -->
                <div id="etalase-kids" class="title-top-men">
                    <p>KID'S SHOES AND CLOTHES</p>
                </div>
                <div class="container-slide">
                    <button class="btn-slider btn-prev3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-left-icon lucide-chevron-left">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>
                    <div id="slider3" class="etalase-slide">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" tabindex="0"
                                                    class="lucide lucide-heart-icon lucide-heart">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right-icon lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
                <div class="progress-bar">
                    <div id="progress3"></div>
                </div>
            </div>

            <!--gif-shoes-->
            <div class="main-wrapper">
                <div class="content-gif"></div>
            </div>

            <div class="main-wrapper adidas-content">
                <div class="col1">
                    <div class="adidas-logo">
                        <img src="https://yt3.googleusercontent.com/wW1Hc3u9RvUpTCBkku3JjMQKT0N-Lo6Q2gqGrweqJSuwrChNkvMObUzX734Srvo3RRbl7kTZjxw=s160-c-k-c0x00ffffff-no-rj"
                            alt="Adidas" />
                    </div>
                </div>
                <div class="col2">
                    <a href="{{ route('beranda')}}" target="_blank" rel="noopener noreferrer" class="btn-link">
                        SIGN IN ACCOUNT
                    </a>
                </div>
            </div>

            <!--desk2-->
            <div class="main-wrapper">
                <div class="container-desk2">
                    <div class="col">
                        <h2>SNEAKERS, ACTIVEWEAR AND SPORTING GOODS</h2>
                        <p>
                            Calling all athletes. Gear up for your favorite sport with adidas
                            sneakers and activewear for men and women. From running to soccer
                            and the gym to the trail, performance workout clothes and shoes keep
                            you feeling your best. Find sport-specific sneakers to support your
                            passion, and shop versatile activewear and accessories that support
                            everyday comfort. adidas has you covered with world-class
                            performance, quality and unmatched comfort to fit your style.
                            Explore the full range of adidas gear today.
                            <br />
                            <br />
                            Founded on performance, adidas sporting goods equipment supports
                            athletes at all levels. Men, women and kids will find their best
                            form in sneakers and activewear made to perform under pressure.
                            adidas sportswear breathes, manages sweat and helps support working
                            muscles. Explore sport-specific clothes and gear for basketball,
                            soccer, or the yoga studio. Runners will find a range of sneakers
                            for training, racing and trail runs. Gym users will find tops, tees
                            and tanks that support focused efforts with adidas CLIMACOOL to feel
                            cool and dry. Explore warm-ups featuring four-way stretch to support
                            mobility. Find a new outdoor jacket that helps protect against wind
                            and rain. Lace up new athletic shoes that energize every step with
                            adidas Boost cushioning. With sizes and styles for all ages, we have
                            sporting goods for the whole family. Dedicated training demands
                            dedicated workout clothes. Experience the latest performance fabrics
                            and sneaker technologies to get the most out of your next training
                            session
                        </p>
                    </div>
                </div>
            </div>
            <!--banner-promo-->
            <div class="main-wrapper">
                <div class="container-banner">
                    <h1>JOIN OUR ADICLUB & GET 15% OFF</h1>
                </div>
            </div>
            <!--footer-allContent-->
            <footer>
                <div class="footer-content">
                    <p>`Adidas &copy; 2025 | adidas America, Inc.</p>
                </div>
            </footer>
        </div>
    </div>



    <script>
        // =======================
        // animasi fadeIn
        // =======================
        window.addEventListener("DOMContentLoaded", () => {
            const overlay = document.getElementById("overlay");

            // pastikan elemen terlihat
            overlay.style.display = "block";

            // jalankan fadeIn
            setTimeout(() => {
                overlay.classList.add("show");
            }, 1000); // delay kecil supaya transition bekerja
        });

        //

        // ===============================
        // animasi fadeUp kalo scrollDown
        // ===============================
        let lastScroll = 0;
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", () => {
            const currentScroll = window.scrollY;

            if (currentScroll > lastScroll && currentScroll > 50) {
                // scroll down → hide navbar
                navbar.classList.add("hide");
            } else {
                // scroll up → show navbar
                navbar.classList.remove("hide");
            }

            lastScroll = currentScroll;
        });

        //

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
</body>

</html>