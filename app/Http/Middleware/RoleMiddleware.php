<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (session('role') !== $role) {
            return redirect()->route('login')->with('error', 'You are not allowed to access that page.');
        }

        return $next($request);
    }
}
