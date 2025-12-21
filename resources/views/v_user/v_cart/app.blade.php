@include('base2.start')

<title>Tab Cart | Adidas</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="flex md:flex-row flex-col">
                @include('base2.sidebar')
                @yield('content')
            </div>
        </div>
    </div>

    @include('base2.end')