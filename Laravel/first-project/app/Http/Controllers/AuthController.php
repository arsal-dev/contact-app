<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
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
            'password' => 'required|confirmed:confirm-password',
        ]);

        User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => Hash::make($validated_data['password']),
        ]);

        Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']]);

        return redirect('/teacher/create')->with('message', 'You are registered and logged in');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('message', 'logged out');
    }

    public function login(Request $request)
    {
        $validated_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $login = Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']]);

        if ($login) {
            return redirect('/teacher/create')->with('message', 'You are logged in');
        } else {
            return redirect('/login')->with('error', 'Email or Password is incorrect');
        }
    }
}
