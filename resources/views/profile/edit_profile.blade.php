@extends('profile.profile-layout')
@section('profile')
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form action="{{ route('update_profile') }}" id="edit_profile_form" method="post">
                @csrf
                @method('put')
				{{-- name --}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}"
                        class="form-control" id="name" placeholder="Enter name">
                    @if ($errors->any('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
				{{-- email --}}
                <div class="form-group ">	
                    <label for="email">Email</label>
                    <input type="text" value="{{ old('email') ? old('email') : $user->email }}"
                        name="email" class="form-control" id="email" placeholder="Enter email">
                    @if ($errors->any('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
				{{-- coutry --}}
                <div class="form-group ">	
                    <label for="country">Country</label>
                    <input type="text" value="{{ old('country') ? old('country') : $user->country }}"
                        name="country" class="form-control" id="country" placeholder="Enter country">
                    @if ($errors->any('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    @endif
                </div>
					{{-- phone number --}}
				<div class="form-group ">	
                    <label for="numberphone">Phone Number</label>
                    <input type="text" value="{{ old('numberphone') ? old('numberphone') : $user->numberphone }}"
                        name="numberphone" class="form-control" id="numberphone" placeholder="Enter Phone Number">
                    @if ($errors->any('numberphone'))
                        <span class="numberphone">{{ $errors->first('numberphone') }}</span>
                    @endif
                </div>
			
				



                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>

    </div>
@endsection
