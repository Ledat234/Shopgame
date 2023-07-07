@include('product.layout')
@extends('admin.layout.index')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Profile Accout</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('welcome.index') }}"> Back</a>

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

    <form action="{{ route('auth.update', $user->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name"
                        value="{{ $user->name }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Country:</strong>

                    <input type="text" name="country" class="form-control" placeholder="Country"
                        value="{{ $user->country }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Phone Number:</strong>

                    <input type="text" name="numberphone" class="form-control" placeholder="Phone Number"
                        value="{{ $user->numberphone }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" class="form-control" placeholder="Email"
                        value="{{ $user->email }}">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>

                    <select name="role" class="form-control">

                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>

                </div>

            </div>
          


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>

@endsection
