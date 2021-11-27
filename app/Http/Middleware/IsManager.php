<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IsManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('staff')->user() &&  Auth::guard('staff')->user()->type == 'manager') {

            return $next($request);
        } else {
            Alert::error('Acces interzis!', 'Nu aveti dreptul sa accesati aceasta zona a sitului!')->persistent(true, false);
        }

        return back()->with('error', 'Nu aveti dreptul sa accesati aceasta zona a sitului!');
    }
}
