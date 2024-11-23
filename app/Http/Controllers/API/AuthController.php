<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\API\BaseController as BaseController;
use Laravel\Sanctum\NewAccessToken;

class AuthController extends BaseController
{
    // public function login(Request $request): JsonResponse
    // { 
    //     // Validasi input
    //     $credentials = $request->validate([
    //         'username' => 'required|string',
    //         'password' => 'required|string',
    //     ]);

    //     // Autentikasi dengan guard 'student'
    //     if (Auth::guard('student')->attempt($credentials)) {
    //         $user = Auth::guard('student')->user();
    //         $token = $user->createToken($request->token_name)->plainTextToken;

    //         $response = [
    //             'token' => $token,
    //             'name' => $user->name,
    //             'role' => 'student'
    //         ];
            
    //         return $this->sendResponse($response, 'Berhasil login sebagai student.');
    //     }

    //     // Autentikasi dengan guard 'admin'
    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         $user = Auth::guard('admin')->user();
    //         $token = $user->createToken('StudentToken')->plainTextToken;

    //         $response = [
    //             'token' => $token,
    //             'name' => $user->name,
    //             'role' => 'admin'
    //         ];

    //         return $this->sendResponse($response, 'Berhasil login sebagai admin.');
    //     }

    //     // Jika autentikasi gagal
    //     return $this->sendError('Login failed!', ['error' => 'Invalid credentials'], 401);
    // } 

    // public function logout(Request $request): JsonResponse
    // {
    //     $user = Auth::user();
    //     $user->tokens()->delete(); // Hapus semua token pengguna untuk logout

    //     return $this->sendResponse([], 'Berhasil logout.');
    // }
}
