<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="{{ route('product.home') }}" class="logo">
                <img src="https://www.creativosonline.org/wp-content/uploads/2022/11/gamer-logo.png" alt="ShopGame Logo"
                    width="100" height="100" style="border-radius:100px ">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="{{ route('pages.search') }}" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label for="query" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="query" placeholder="Search ..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>

        <div class="header-right">
            <div class="dropdown">
                <a href="{{ route('cart') }}" class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i>Cart</a>



            </div>
            <div class="nav">
                <li class="nav-profile dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            @if (session('user'))
                                <b>{{ session('user')->name }}</b>
                            @endif
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class='fas fa-sign-out-alt'></i> Logout

                        </a>

                        </a>
                    </div>
                </li>
            </div>
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->

