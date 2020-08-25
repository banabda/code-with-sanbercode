<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $message = "";
        if ($request->getPathInfo() == "/superadmin") {
            $message = "Super Admin";
        } elseif ($request->getPathInfo() == "/admin") {
            $message = "Admin";
        }
        if (Auth::user()->isAdmin() != null) {
            if (Auth::user()->isAdmin() == 2 && $request->getPathInfo() == "/superadmin") {
                return $next($request);
            } elseif (Auth::user()->isAdmin() > 0 && $request->getPathInfo() == "/admin") {
                return $next($request);
            } elseif ($request->getPathInfo() == "/guest") {
                return $next($request);
            }
        }
        abort(403, $message);
    }
}
