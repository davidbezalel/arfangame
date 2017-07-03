<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        $whitelist = [
            '/admin/login',
            '/admin/register',
            '/',
            '/player/register',
            '/player/login'
        ];

        $path = explode("/", $request->getPathInfo());

        if (in_array($request->getPathInfo(), $whitelist)) {
            if ($path[1] == 'admin' && Auth::check()) {
                return redirect('/admin/dashboard');
            } else if ($path[1] != 'admin' && Auth::guard('user')->check()) {
                return redirect('/player/deposit');
            }
            return $next($request);
        }

        if ($path[1] == 'admin' && !Auth::check()) {
            return redirect('/admin/login');
        } else if ($path[1] != 'admin' && !Auth::guard('user')->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
