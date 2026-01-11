<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Ensures the user is authenticated and optionally checks for admin role.
     * For simple implementations, this just verifies authentication.
     * Extend this class to add role-based checks if needed.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            return redirect()->route('login')
                ->with('error', 'Please login to access the admin area.');
        }

        // Optional: Add admin role check here
        // Uncomment and modify if you have an is_admin column on users table
        // if (!auth()->user()->is_admin) {
        //     abort(403, 'Access denied. Admin privileges required.');
        // }

        return $next($request);
    }
}
