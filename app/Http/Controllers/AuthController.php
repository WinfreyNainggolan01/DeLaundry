<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index ()
    {
        return view('Auth/login');
    }
    
    function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // $user = User::where('email', $request->email)->first();
            // session(['email' => $user->email, 'name' => $user->name]);
            if (Auth::user()->role === 0) {
                return redirect('user');

            } else if (Auth::user()->role === 1) {
                return redirect('operator');

            } else if (Auth::user()->role === 2) {
                return redirect('admin');
            }
            
        } else {
            return redirect('/')->with('message', 'Username dan password yang dimasukkan tidak sesuai');
        }
    }

    function logout() 
    {
        Auth::logout();
        return redirect('/');
    }
}