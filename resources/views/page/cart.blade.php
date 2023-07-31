@include('clien.layout.head')

<div class="nav">
    <li class="nav-profile dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user" aria-hidden="true"></i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


            <a href="{{ route('dashboard') }}" class="dropdown-item">
                <i class="fa fa-user" aria-hidden="true"></i>  @if (session('user'))
              <b>{{ session('user')->name }}</b> 
            @endif
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item">
                <i class='fas fa-sign-out-alt'></i> Logout

            </a>

            </a>
        </div>

</div>

@extends('page.layout')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($cartProducts as $cartProduct)
                @php
                    $id = $cartProduct->id;
                    $price = $cartProduct->product->price;
                    $quantity = $cartProduct->quantity;
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('image/product/' . $cartProduct->product->image[0]->image) }}"
                                    alt="" class="img-responsive" width="100p" />
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cartProduct->product->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $cartProduct->product->price }}</td>
                    <td data-th="Quantity">{{ $cartProduct->quantity }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $subtotal }}</td>
                    <td class="actions" data-th="">
                        <form action="{{ route('cart.remove', $cartProduct->product_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $cartProduct->product_id }}">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <!-- Add any actions/buttons here if needed -->
                    </td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right">
                    <h3><strong>Total ${{ $total }}</strong></h3>
                </td>

            </tr>

            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/game/home') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Continue Shopping
                    </a>
                    <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
