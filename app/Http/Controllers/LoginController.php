<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('login');
    }
    
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // dd('berhasil login');

        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            // dd('berhasil login student');
            return redirect()->intended('/homepage');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            // dd('berhasil login admin');
            return redirect()->intended('/admin-dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Login failed!',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();

        }else{
            Auth::guard('student')->logout();
        }


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
