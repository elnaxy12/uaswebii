@include('base2.start')


<title>Tab Dashboard | Adidas</title>
</head>

<body id="overlay" class="fadeIn">
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="flex md:flex-row flex-col">
                @include('base2.sidebar')
                @include('index2.profile')
            </div>
        </div>
    </div>
    @include('base2.end')