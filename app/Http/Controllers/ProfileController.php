<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use Session;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard(){
        $user=auth()->user();
    	$data['user']=$user;
       
    	return view('profile.dashboard',$data);
    }
    public function edit_profile(){
    	$user=auth()->user();
    	$data['user']=$user;
    	return view('profile.edit_profile',$data);
    }

    public function update_profile(Request $request){
    	 $request->validate([
            'email' => 'required|email|max:100',
            'name' => 'required|min:5|max:1000',
            'country' => 'required|max:1000',
            'numberphone' => 'required|max:15',
            
         ]);

         $user=auth()->user();
         if ($user != null) {
            $user->name = $request->name;
            $user->country = $request->country;
            $user->numberphone = $request->numberphone;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('dashboard')
                ->with('success', 'Account updated successfully');
        } else {
            return redirect()->route('edit_profile')
                ->with('Error', 'Account not update');

        }
        

        

    }

    public function change_password(){ 
        return view('profile.change_password');
    }


    public function update_password(Request $request){
        $request->validate([
        'old_password'=>'required|min:6|max:100',
        'new_password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            $current_user->save();
            return redirect()->route('logout')
                ->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('change_password')
                ->with('Error', 'Password updated Fails ,Check the old password');

        }   


    }
}
