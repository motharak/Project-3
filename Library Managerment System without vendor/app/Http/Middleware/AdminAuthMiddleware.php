<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (empty(session('username'))) {
            return redirect('/login');
        }

        return $next($request);
    }
}
