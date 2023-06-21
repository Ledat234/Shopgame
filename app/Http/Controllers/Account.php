<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    

    public function show()
    {
        $roles= Role::all();

        return view('auth.register',['roles' =>$roles]); //return register page

    }

    public function showLogin()
    {
        return view('auth.login'); //return login page

    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user); // Lưu thông tin người dùng vào session
        
            if ($user->role_id == '1') {
                return redirect()->intended('/game/index');
            } elseif ($user->role_id == '2') {
                // Xử lý cho role 2
                return redirect()->intended('/game/home');
            } else {
                return redirect()->intended('/');
            }
        }
        
        return redirect('/')->with('error', 'Invalid login credentials');
        
    }

    public function store(Request $request)
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


            $user = DB::table('users')->where('email', $request->email)->first();
            if (!$user) {
                $newUser = new Users();
                $newUser->email = $request->email;
                $newUser->country=$request->country;
                $newUser->numberphone=$request->numberphone;
                $newUser->password = Hash::make($request->password);
                $newUser->name = $request->name;
                $newUser->role_id = $request->role;
                $newUser->save();

                return redirect()->route('welcome.login')->with('message', 'Create success!');
            } else {

                return redirect()->route('welcome.register')->with('message', 'Create failed!');

            }

        }

    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('welcome.login');

    }
    public function edit()
{
    $user = auth()->user();
    return view('auth.edit', compact('user'));
}

public function update(Request $request)
{
    $user = auth()->user();

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        
        // Thêm các validation rules cho các cột khác
    ]);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    
    // Cập nhật các cột khác

    $user->save();

    return redirect()->route('auth.edit')->with('success', 'Profile updated successfully.');
}

}
