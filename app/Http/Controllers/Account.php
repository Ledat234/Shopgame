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

class Account extends Controller
{


    public function show()
    {
        $roles = Role::all();

        return view('auth.register', ['roles' => $roles]); //return register page

    }
    public function showAccount()
    {
        $users = Users::latest()->paginate(20);

        return view('auth.index', compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 20);
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

            if ($user->role_id == 1) {
                $request->session()->put('user', Auth::user());
                return redirect()->intended('/game/index');
            } elseif ($user->role_id == 2) {
                // Xử lý cho role 2
                $request->session()->put('user', Auth::user());
                return redirect()->intended('/game/home');
            } elseif ($user->role_id == 3) {
                $request->session()->put('user', Auth::user());
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
                $newUser->country = $request->country;
                $newUser->numberphone = $request->numberphone;
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
    public function edit($id)
    {
        $roles = Role::all();

        $user = Users::with('role')->find($id);

        return view('auth.edit', ['user' => $user, 'roles' => $roles]);


    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:100',
                'name' => 'required|min:5|max:1000',
                'country' => 'required|max:1000',
                'numberphone' => 'required|max:15'

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
                $user->role_id = $request->role;
                $user->save();
                return redirect()->route('product.index')
                    ->with('success', 'Account updated successfully');
            } else {
                return redirect()->route('product.index')
                    ->with('Error', 'Account not update');

            }

        }

    }
    public function loginAdmin()
    {
        $users = Users::latest()->paginate(20);

        return view('admin.home', compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    
}