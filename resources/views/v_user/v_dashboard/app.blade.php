@include('base2.start')

<body>
    @include('base2.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="flex md:flex-row flex-col">
                @include('base2.sidebar')
                @include('base2.profile')
            </div>
            @include('base2.end')
        </div>
    </div>
</body>