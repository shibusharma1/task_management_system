<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userRole = $user->designation->hierarchy_level ?? null;

        $allowedRoles = explode(',', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
// class RoleMiddleware
// {
//     public function handle(Request $request, Closure $next, $roles)
//     {
//         if (!Auth::check()) {
//             return redirect()->route('login');
//         }

//         $user = Auth::user();
//         $userRole = $user->designation->hierarchy_level ?? null;

//         // Convert roles to integers to avoid type mismatch
//         $allowedRoles = array_map('intval', explode(',', $roles));

//         if (!in_array($userRole, $allowedRoles, true)) {
//             abort(403, 'Unauthorized access.');
//         }

//         return $next($request);
//     }
}
