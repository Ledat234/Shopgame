@include('product.layout')
@extends('clien.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Game</h2>
            </div>
        </div>
    </div>
    <div class="card-wrapper">
        
        <div class="card">
            
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        @foreach ($product->image as $image)
                            <img src="{{ asset('image/product/' . $image->image) }}" alt="" width="150px" height="300px">
                        @endforeach
                    </div>
                </div>
                <div class="img-select">
                    @foreach ($product->image as $index => $image)
                        <div class="img-item">
                            <a href="#" data-id="{{ $index + 1 }}">
                                <img src="{{ asset('image/product/' . $image->image) }}" alt="" style="margin: 15px"
                                    height="150" width="250"><br>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- card right -->
        <div class="product-content">
            <h2 class="product-title"> {{ $product->name }}</h2>


            <div class="product-price">
                <p class="new-price">Price: <span>${{ $product->price }}</span></p>
            </div>

            <div class="product-detail">
                <h2>about this item: </h2>
                <p> {{ $product->description }}</p>
                <ul>
                    <li>Publisher: <span> {{ $product->publisher->name }}</span></li>
                </ul>
            </div>

            <div class="purchase-info">

                <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}"
                        class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>

            </div>
          
            <div class="social-links">
                <p>Share: </p>
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
            <div class="purchase-info">
                <a class="btn btn-primary" href="{{ route('product.home') }}"> Back</a>
            </div>
        </div>
    </div>
    </div>



    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }


        window.addEventListener('resize', slideImage);
    </script>
@endsection
