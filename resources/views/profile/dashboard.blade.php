@extends('profile.profile-layout')
@section('profile')
    <div class="card">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body">
            <h5 class="card-title">Welcome to your profile: {{ $user->name }}</h5> <br> <br>
            <p>Email: {{ $user->email }}</p>
            <p>Country: {{ $user->country }}</p>
            <p>Phone Number: 0{{ $user->numberphone }}</p>
            

        </div>
    </div>
@endsection
