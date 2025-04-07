<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (is_null($role)) {
            // Optionally handle cases where role is not provided
            abort(403, 'Role parameter missing.');
        }

        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}