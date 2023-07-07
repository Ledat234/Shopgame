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
                                <p>{{ $product->description }}</p>
                                <p><strong>Price: </strong> ${{ $product->price }}</p>
                                <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}"
                                        class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                                <p class="btn-holder"><a href="{{ route('home.show', $product->id) }}"
                                        class="btn btn-primary btn-block text-center" role="button">View </a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
