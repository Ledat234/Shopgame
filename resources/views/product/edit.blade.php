@include('product.layout')
@extends('admin.layout.index')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Profile Game</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>

            </div>

        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name"
                        value="{{ $product->name }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Publisher:</strong>

                    <select name="publisher" class="form-control">

                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Image:</strong>

                            @foreach ($product->image as $image)
                                <img src="{{ asset('image/product/' . $image->image) }}" alt="" style="margin: 15px"
                                    height=150 width=250>
                            @endforeach
                            <input type="file" class="form-control" placeholder="Image" value=""
                                name="image[]" id ="" multiple />

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <input type="number" name="price" class="form-control" placeholder="Price"
                        value="{{ $product->price }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $product->description }}</textarea>

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>

@endsection
