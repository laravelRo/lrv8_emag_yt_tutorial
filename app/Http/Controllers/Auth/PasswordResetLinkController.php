<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.forgot-password');
        return view('front.user.reset-password');
    }

    /**
     * Handle an incoming password reset link request.
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
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Trebuie sa introduceti o adresa de email valida',
                'email.email' => 'Trebuie sa introduceti o adresa de email valida',
            ]
        );

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );


        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'A fost trimis un link pentru resetarea parolei la adresa ' . $request->email)

            : back()->withInput($request->only('email'))
            ->withErrors(['email' => 'Adresa ' . $request->email . ' nu este inregistrata pe situl nostru!']);
    }
}
