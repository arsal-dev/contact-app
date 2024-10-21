<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function register_post(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
        ]);

        if (Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']])) {
            return redirect('/dashboard')->with('message', 'login successfull');
        } else {
            return redirect('/login')->with('error', 'username or password is incorrect');
        }
    }

    public function login_post(Request $request)
    {
        $validated_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']])) {
            return redirect('/dashboard')->with('message', 'login successfull');
        } else {
            return redirect('/login')->with('error', 'username or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
