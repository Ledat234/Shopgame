@include('product.layout')
@extends('admin.layout.index')
@section('content')
    <h2 style="align-content: center">
        @if (session('user'))
            Hello <b>{{ session('user')->name }}</b> 
        @endif,Welcome to Page Manage
    </h2>
    <img src="https://d9n64ieh9hz8y.cloudfront.net/wp-content/uploads/20230210005621/14-game-pc-moi-thang-2-2023-lich-phat-hanh-game.jpg"
        alt="Home Admin" width="1200px">
@endsection
