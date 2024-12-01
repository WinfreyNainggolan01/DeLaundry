<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->guard('user')->role == (int)$role){
            return $next($request);
        }

        if (auth()->guard('user')->role == 0) {
            return redirect('user');
        } else if (auth()->guard('user')->role == 1) {
            return redirect('operator');
        } else if (auth()->guard('user')->role == 2) {
            return redirect('admin');
        }

        
        
    }
}