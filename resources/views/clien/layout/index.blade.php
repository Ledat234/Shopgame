@include('clien.layout.head')

<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            @include('clien.layout.headermid')
            @include('clien.layout.sidebar')
        </header>
       
        @include('clien.layout.banner')
        <div class="container new-arrivals">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
        @yield('content')
                </div>
            </div>
        </div>
        @include('clien.layout.footer')
    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    <div class="mobile-menu-overlay"></div>
    @include('clien.layout.menumobile')
    @include('clien.layout.js')
</body>
