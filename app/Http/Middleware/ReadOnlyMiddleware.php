<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ReadOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 0) {
            // Retrieve the current action method name (e.g., 'store', 'update')
            $action = $request->route()->getActionMethod();
            
            // Check if the action is either store or update
            if (in_array($action, ['store', 'update', 'create'])) {
                abort(403, 'You do not have permission to perform this action.');
            }
        }
        
        return $next($request);
    }
}
