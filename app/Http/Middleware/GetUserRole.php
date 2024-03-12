<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->roles->first();

            if ($role) {
                // Menyimpan peran dalam session atau sesuai kebutuhan
                session(['user_role' => $role->name]);
            }
        }

        return $next($request);
    }
}