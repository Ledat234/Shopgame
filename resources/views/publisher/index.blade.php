@include('product.layout')
@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Publisher Management</h2>
            </div>
        </div>
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('publisher.create') }}"> Add New Game</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>
    @endif

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Country</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($publishers as $key => $publisher)
       
            <tr>

                <td>{{ $key + 1 }}</td>

                <td>{{ $publisher->name }}</td>

                <td>{{ $publisher->country }}</td>

                <td>

                    <form action="{{ route('publisher.destroy', $publisher->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('publisher.show', $publisher->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('publisher.edit', $publisher->id) }}">Edit</a>

                        <a class="btn btn-primary" href="{{ route('publisher.destroy', $publisher->id) }}">Delete</a>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>
@endsection
