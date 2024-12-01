<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

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

    public function loginApi(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek apakah user adalah Student
        $student = Student::where('username', $credentials['username'])->first();
        if ($student && Hash::check($credentials['password'], $student->password)) {
            $token = $student->createToken('StudentToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'role' => 'student',
            ]);}

        // Cek apakah user adalah Admin
        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $token = $admin->createToken('AdminToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'role' => 'admin',
            ]);
        }

        // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
        return response()->json(['message' => 'Username atau Password salah'], 401);
    }

    // Endpoint untuk mendapatkan data user
    public function getUser(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    

    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out',
        ]);
    }

}
