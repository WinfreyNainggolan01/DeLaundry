<?php 

namespace App\Http\Controllers\API; 

use App\Models\User; 
use Illuminate\Http\JsonResponse; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\API\BaseController as BaseController; 

class UserController extends BaseController 
{ 
    public function me(): JsonResponse 
    { 
        $user = Auth::user(); 
        return $this->sendResponse($user, 'Berhasil mengambil informasi akun.'); 
    } 

    public function detail($id): JsonResponse 
    { 
        $user = User::find($id); 
        if (!$user) {
            return $this->sendError('User not found', [], 404);
        }
        return $this->sendResponse($user, 'Berhasil mengambil informasi akun.'); 
    } 

    public function all(): JsonResponse 
    { 
        $users = User::all(); 
        return $this->sendResponse($users, 'Berhasil mengambil data pengguna.'); 
    } 
} 
