<?php

namespace App\Http\Controllers\Auth;

use App\Models\shop\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.login');
        return view('front.user.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        //actualizez cosul cu produse
        Cart::updateUserCart();

        $request->session()->regenerate();

        Alert::success('Logare cu success', 'Ati fost logat in contul Dvs de utilizator pe emag')->persistent(true, false);

        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended(route('home'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //afisam mesajul sweet alert pentru delogare
        Alert::success('Ati fost delogat!', 'In acest moment nu mai sunteti logat in contul de utilizator')
            ->persistent(true, false);

        return redirect('/');
    }
}
