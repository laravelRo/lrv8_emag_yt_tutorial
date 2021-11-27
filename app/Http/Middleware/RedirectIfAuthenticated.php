<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::guard('staff')->check()) {
            Alert::info('Sunteti autentificat pe site')->persistent(true, false);
            return redirect(route('control-panel'));
        }
        if (Auth::guard('web')->check()) {
            Alert::info('Sunteti autentificat pe site')->persistent(true, false);
            return redirect(route('home'));
        }

        //codul breeze

        // foreach ($guards as $guard) {

        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        return $next($request);
    }
}
