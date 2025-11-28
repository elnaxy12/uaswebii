@include('base2.start')


<title>Tab Dashboard | Adidas</title>
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="grid grid-rows-2 md:grid-cols-2 md:grid-rows-1 gap-4 md:w-3xl w-full h-screen">
                @include('base2.sidebar')
                @include('index2.profile')
            </div>
        </div>
    </div>
    @include('base2.end')