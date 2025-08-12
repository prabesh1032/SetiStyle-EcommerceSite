<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated first
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login to access this page');
        }

        // Check if authenticated user has admin role
        if (Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            return redirect('/')->with('error', 'You do not have admin access');
        }
    }
}
