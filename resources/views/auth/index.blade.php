@include('product.layout')
@extends('admin.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Game Management</h2>
            </div>
            <br><br>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" ,border="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Country</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->numberphone }}</td>
                <td>{{ $user->role->name }}</td>
                

                <td>

                    <form action="{{ route('welcome.destroy', $user->id) }}" method="POST">
                       
                        <a class="btn btn-primary" href="{{ route('welcome.update', $user->id) }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('welcome.destroy', $user->id) }}">Delete</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
