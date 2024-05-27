<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'superadmin') {
                return $next($request);
            } else {
                throw new AuthenticationException('User role is not superadmin. Role: ' . auth()->user()->role);
            }
        } else {
            throw new AuthenticationException('User is not authenticated.');
        }
    }
}
