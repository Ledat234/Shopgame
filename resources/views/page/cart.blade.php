@extends('page.layout')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
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
                                    alt="" class="img-responsive" />
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
                <td></td>
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

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>

        @php $total = 0 @endphp
        @if (session('cart'))
            @foreach (session('cart') as $id => $details)
                @php
                    $price = isset($details['price']) ? $details['price'] : 0;
                    $quantity = isset($details['quantity']) ? $details['quantity'] : 0;
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">
                                    {{ isset($details['product_name']) ? $details['product_name'] : '' }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $quantity }}" class="form-control quantity cart_update"
                            min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $subtotal }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>
            @endforeach
        @endif

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total ${{ $total }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/game/home') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                    Shopping</a>
                <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
