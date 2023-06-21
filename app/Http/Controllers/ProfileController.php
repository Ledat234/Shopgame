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
    
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:100',
                'name' => 'required|min:5|max:1000',
                'country' => 'required|max:1000',
                'numberphone' => 'required|max:15',
                'password' => 'required|confirmed|max:16|min:6',

            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }



            $user = Users::find($id);
            if ($user != null) {
                $user->name = $request->name;
                $user->country = $request->country;
                $user->numberphone = $request->numberphone;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role_id = $request->role;
                $user->save();

                $user->save();
                return redirect()->route('product.index')
                    ->with('success', 'Account updated successfully');
            } else {
                return redirect()->route('product.index')
                    ->with('Error', 'Account not update');

            }

        }

    }
   
}
