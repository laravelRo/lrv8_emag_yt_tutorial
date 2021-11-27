<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        // return view('auth.reset-password', ['request' => $request]);
        return view('front.user.new-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
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
                'token' => 'required',
                'email' => 'required|email',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'token.required' => 'Url-ul pentru resetarea parolei nu este valid',
                'email.email' => 'Trebuie sa introduceti o adresa de email valida',
                'email.required' => 'Trebuie sa introduceti o adresa de email valida',
                'password.required' => 'Trebuie sa introduceti noua parola si sa o confirmati exact',
                'password.confirmed' => 'Trebuie sa introduceti noua parola si sa o confirmati exact'
            ]
        );

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status == Password::PASSWORD_RESET) {
            Alert::success('Parola a fost schimbata!', 'Noua Dvs parola este: ' . $request->password .
                ' Notati aceasta parola intr-un loc sigur')->persistent(true, false);
            return redirect()->route('login')->with('status', __($status));
        } else {
            return
                back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
        }


        // return $status == Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('status', __($status))
        //     : back()->withInput($request->only('email'))
        //     ->withErrors(['email' => __($status)]);
    }
}
