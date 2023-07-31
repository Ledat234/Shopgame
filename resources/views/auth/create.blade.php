@include('product.layout')
@extends('admin.layout.index')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Account</h2>

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

    <form action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Full Name" value="" name="name" />
                    @if ($errors->has('name'))
                        {{ $errors->first('name') }}
                    @endif

                </div>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Country" value="" name="country" />

                @if ($errors->has('country'))
                    {{ $errors->first('country') }}
                @endif

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Phone number" value="" name="numberphone" />
                @if ($errors->has('numberphone'))
                    {{ $errors->first('numberphone') }}
                @endif

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" />
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif

            </div>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" placeholder="Password *" value="" name="password" />

            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>


        <div class="form-group">

            <input type="password" class="form-control" placeholder="Confirm Password *" value=""
                name="password_confirmation" />

        </div>
        <div class="form-group">

            <select class="form-control" name="role">

                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('role'))
                {{ $errors->first('role') }}
            @endif
        </div>


        <input type="submit" class="btnRegister" value="Add" />

        </div>

        </div>

    </form>

@endsection
</form>
</body>

</html>
