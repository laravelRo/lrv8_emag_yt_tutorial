<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\shop\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //vederea breeze
        // return view('auth.register');

        return view('front.user.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.required' => 'Trebuie sa introduceti obligatoriu un nume de utilizator',
                'name.string' => 'Numele trebuie sa fie un sir de caractere - nu poate incepe cu o cifra',
                'name.max' => 'Numele nu poate depasi 255 de caracere, inclusiv spatiile goale',

                'email.required' => 'Adresa de email este obligatorie',
                'email.email' => 'Trebuie sa introduceti o adresa de email valida',
                'email.unique' => 'Aceasta adresa de email este deja inregistrata pe site',
                'email.max' => 'Emailul nu poate avea mai mult de 255 de caractere',

                'password.required' => 'Trebuie sa introduceti obligatoriu o parola pentru cont',
                'password.confirmed' => 'Nu ati confirmat corect parola'

            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        Auth::login($user);

        //actualizez cosul cu produse
        Cart::updateUserCart();

        // return redirect(RouteServiceProvider::HOME);
        Alert::success('Contul a fost creat', 'Va rugam verificati adresa de email pentru validarea contului')
            ->persistent(true, false);
        return redirect(route('home'));
    }
}
