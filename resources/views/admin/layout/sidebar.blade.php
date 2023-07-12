<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://www.creativosonline.org/wp-content/uploads/2022/11/gamer-logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" width="50px" height="50px">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img title="Account" class="img-profile rounded-circle"
                    src="https://cdn.onlinewebfonts.com/svg/img_88236.png" alt="" width="30px" height="30px"
                    style="padding: 0px">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">
                    @if (session('user'))
                        <p>{{ session('user')->name }}</p>
                    @endif



                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.home') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manage Options
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Game</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('publisher.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Publisher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Manage Category</p>
                            </a>
                        </li>
                        @if (auth()->user()->role_id == 3)
                        <li class="nav-item">
                            <a href="{{ route('welcome.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Account</p>
                            </a>
                        </li>
                        @endif
                       

                    </ul>
                </li>

                <!-- /.sidebar -->
</aside>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
