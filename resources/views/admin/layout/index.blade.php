@include('admin.layout.head')

<body class="hold-transition sidebar-mini">
    <div id="wrapper">
        @include('admin.layout.navbar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            @include('admin.layout.sidebar')
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Hiển thị nội dung của từng trang con-->
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
        @include('admin.layout.js')
        <div class="mobile-menu-overlay"></div>
</body>
