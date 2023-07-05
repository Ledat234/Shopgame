@extends('clien.layout.index')
@section('product')
    @foreach ($products as $key => $product)
        <div class="col-sm-3">
            <div class="thumb-wrapper">
                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                <div class="img-box">
                    <img src="{{ asset('image/product/' . $product->image[0]->image) }}" class="img-fluid" alt="">
                </div>
                <div class="thumb-content">
                    <h4>{{ $product->name }}</h4>
                    <div class="star-rating">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                        </ul>
                    </div>
                    <p class="item-price">{{ $product->name }}</b></p>
                    <a href="#" class="btn btn-primary">View Detail</a>
                </div>

            </div>
        </div>
    @endforeach
@endsection
