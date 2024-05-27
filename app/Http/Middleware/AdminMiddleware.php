<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return $next($request);
            } else {
                dd('User role is not admin. Role: ' . auth()->user()->role);  // Debug statement
            }
        } else {
            dd('User is not authenticated.');  // Debug statement
        }

        return redirect('/');
    }
}
