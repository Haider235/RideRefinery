<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
public function handle(Request $request, Closure $next)
{
    $user = Auth::user();

    if ($user && $user->is_admin) { // assuming your users table has 'is_admin'
        return $next($request);
    }

    return redirect()->route('login');
}

}
