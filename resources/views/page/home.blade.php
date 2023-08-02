@include('product.layout')
@extends('clien.layout.index')
@section('content')
    <h2 class="list-product-title">NEW Game</h2>

    <div class="list-product-subtitle">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>List Game New</p>

        <div class="product-group">

            <div class="row">


                @foreach ($products as $product)
                    <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                        <div class="img_thumbnail productlist">
                            <img class="images" src="{{ asset('image/product/' . $product->image[0]->image) }}"
                                alt="">
                            <div class="caption">
                                <h4>{{ $product->name }}</h4>
                                <strong>Category:</strong>
                                @foreach ($product->category as $category)
                                    <a href="#"> {{ $category->name }}</a>
                                @endforeach
                                <p><strong>Price: </strong> ${{ $product->price }}</p>

                                <p class="purchase-info"><a href="{{ route('home.show', $product->id) }}"
                                        class="btn btn-primary btn-block text-center" role="button">View Detail</a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="row no-gutters bg-white newsletter-popup-content">
                            <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                                <div class="banner-content text-center">
                                    <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo"
                                        width="60" height="15">
                                    <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                                    <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your
                                        favorite products.</p>
                                    <form action="#">
                                        <div class="input-group input-group-round">
                                            <input type="email" class="form-control form-control-white"
                                                placeholder="Your Email Address" aria-label="Email Adress" required>
                                            <div class="input-group-append">
                                                <button class="btn" type="submit"><span>go</span></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- .End .input-group -->
                                    </form>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                        <label class="custom-control-label" for="register-policy-2">Do not show this popup
                                            again</label>
                                    </div><!-- End .custom-checkbox -->
                                </div>
                            </div>
                            <div class="col-xl-2-5col col-lg-5 ">
                                <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
