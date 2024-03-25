<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user has the role of admin
            if (Auth::user()->isAdmin()) {
                // If the user is an admin, allow the request to proceed
                return $next($request);
            }
        }

        // If the user is not authenticated or not an admin, redirect them to the login page
        return redirect('/login')->with('error', 'Unauthorized');
    }
}
