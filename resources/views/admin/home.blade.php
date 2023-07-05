@extends('admin.layout.index')
@include('product.layou')
@section('content')
    <h2 class="list-product-title">NEW Game</h2>

    <div class="list-product-subtitle">


        <p>List Game New</p>

    </div>
    <div class="product-group">

        <div class="row">

            @foreach ($products as $key => $product)
                <div class="el-wrapper">
                    <div class="box-up">
                        <img class="images-detail" src="{{ asset('image/product/' . $product->image[0]->image) }}"
                            alt="" height=150 width=250>
                        <div class="img-info">
                            <div class="info-inner">
                                <span class="p-name">{{ $product->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="box-down">
                        <div class="h-bg">
                            <div class="h-bg-inner"></div>
                        </div>
                        <a class="cart" href="{{ url('add-to-cart/' . $product->id) }}">
                            <span class="price">{{ $product->price }} $</span>
                            <span class="add-to-cart">
                                <span class="txt">Add to cart</span>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection