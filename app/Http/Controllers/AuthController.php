<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function login_post(Request $request)
    {
        if ($request->input('check')) {
            $remember = true;
        } else {
            $remember = false;
        }

        $request->validate([ 
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        $result = Auth()->attempt($credentials, $remember);

        if ($result) {
            return view('dashboard');
        } else {
            return redirect()->back()->with('msg', 'Credentials not match');
        }

    }
    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {

        if ($request->input('check')) {
            $remember = true;
        } else {
            $remember = false;
        }

        $request->validate([ 
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([ 
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $credentials = $request->only('username', 'password');
        $result = Auth()->attempt($credentials, $remember);

        if ($result) {
            return view('dashboard');
        } else {
            return redirect()->back()->with('msg', 'Something Went Wrong');
        }
    }

    public function logout()
    {
        Auth()->logout();

        return redirect('login');
    }




}