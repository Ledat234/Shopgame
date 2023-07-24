<div class="header-middle">
    <div class="container">
        @yield('scripts')
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
                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>

                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total = 0; @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php
                                    $price = isset($details['price']) ? $details['price'] : 0;
                                    $quantity = isset($details['quantity']) ? $details['quantity'] : 0;
                                    $subtotal = $price * $quantity;
                                    $total += $subtotal;
                                @endphp
                            @endforeach
                        @endif
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
                                    <!-- Hiển thị hình ảnh sản phẩm -->
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['product_name'] ?? '' }}</p>
                                    <span class="price text-info"> ${{ $details['price'] ?? 0 }}</span> 
                                    <span class="count">Quantity:{{ $details['quantity'] ?? 0 }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav">
                <li class="nav-profile dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                            <i class="fa fa-user" aria-hidden="true"></i> MyProfile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class='fas fa-sign-out-alt'></i> Logout

                        </a>

                        </a>
                    </div>
                    
            </div>


        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->
