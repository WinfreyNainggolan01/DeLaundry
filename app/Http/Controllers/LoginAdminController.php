<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
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

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin-dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Login failed!',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
