<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        
        if (!auth()->guard('admin')->check()) {
            return redirect('/login');
        }
        return $next($request);
    }

    public function handleApi(Request $request, Closure $next): Response
    {
        if (!auth()->guard('admin')->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}