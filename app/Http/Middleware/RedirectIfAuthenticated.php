<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard('user')->check()) {
                return redirect(RouteServiceProvider::USER_HOME);
            }
            if (Auth::guard('admin')->check()) {
                return redirect(RouteServiceProvider::ADMIN_HOME);
            }
            if (Auth::guard('hospital')->check()) {
                return redirect(RouteServiceProvider::HOSPITAL_HOME);
            }
            if (Auth::guard('ambulance')->check()) {
                return redirect(RouteServiceProvider::AMBULANCE_HOME);
            }
        }

        return $next($request);
    }
}
