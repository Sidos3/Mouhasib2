<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FournisseurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'fournisseur') {
                return $next($request);
            } else {
                dd('User role is not fournisseur. Role: ' . auth()->user()->role);  // Debug statement
            }
        } else {
            dd('User is not authenticated.');  // Debug statement
        }

        return redirect('/');
    }
}
