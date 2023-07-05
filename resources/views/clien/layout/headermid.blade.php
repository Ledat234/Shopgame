<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="#" class="logo">
                <img src="https://www.creativosonline.org/wp-content/uploads/2022/11/gamer-logo.png" alt="ShopGame Logo"
                    width="100" height="100" style="border-radius:100px ">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label style="height: 20px" for="query" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="query" placeholder="Search ..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>

        <div class="header-right">



            <div class="wishlist">
                <a href="#" title="Wishlist">
                    <div class="icon">
                        <i class="icon-shopping-cart"></i>
                        <span class="wishlist-count badge">3</span>
                    </div>
                    <p>Cart</p>
                </a>

            </div>
            <div class="wishlist">
                <a class="nav-link" href="#" title="Account">
                    <div class="icon">
                        <img src="https://cdn.onlinewebfonts.com/svg/img_88236.png" alt="" width="30px" height="30px">
                        <i class="icon-profile"></i>
                        
                    </div>
                    @if (session('user'))
                        <p>{{ session('user')->name }}</p>
                    @endif
                </a>
            </div>


        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->
