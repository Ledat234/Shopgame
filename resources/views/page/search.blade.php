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
        @if ($searchs->isNotEmpty())
        <h4>Search : <strong>{{ $_GET['query'] }}</strong></h4>
        <div class="product-group">

            <div class="row">


                
                    @foreach ($searchs as $search)
                        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                            <div class="img_thumbnail productlist">
                                <img class="images" src="{{ asset('image/product/' . $search->image[0]->image) }}"
                                    alt="">
                                <div class="caption">
                                    <h4>{{ $search->name }}</h4>
                                    <strong>Category:</strong>
                                    @foreach ($search->category as $category)
                                        <a href="#"> {{ $category->name }}</a>
                                    @endforeach
                                    <p><strong>Price: </strong> ${{ $search->price }}</p>

                                    <p class="purchase-info"><a href="{{ route('home.show', $search->id) }}"
                                            class="btn btn-primary btn-block text-center" role="button">View Detail</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endsection
