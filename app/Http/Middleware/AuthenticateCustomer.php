<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateCustomer
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        }

        return $next($request);
    }
}
