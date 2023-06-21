@include('music.layout')
@extends('admin.layout.index')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show publisher</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $publisher->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Country:</strong>

                {{ $publisher->country }}

            </div>

        </div>

    </div>
@endsection
