<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsername
{
    public function handle($request, Closure $next)
    {
        // Check if the session 'Username' is set to 'demo'
        if (session('username') === 'demo') {
            // Check the current route action and deny access to certain actions
            if ($request->route()->getActionMethod() === 'add' || $request->route()->getActionMethod() === 'edit' || $request->route()->getActionMethod() === 'delete') {
                return redirect()->route('home')->with('error', 'Access denied. Demo user is not allowed to perform this action.');
            }
        }

        return $next($request);
    }
}
