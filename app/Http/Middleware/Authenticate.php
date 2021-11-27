<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //introducem alerta in middleware
            Alert::info('Acces interzis!', 'Nu puteti accesa aceasta sectiune a sitului daca nu sunteti logat!');
            return route('login');
        }
    }
}
