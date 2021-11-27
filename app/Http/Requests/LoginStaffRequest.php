<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Trebuie sa introduceti o adresa de email valida',
            'email.email' => 'Trebuie sa introduceti o adresa de email valida',
            'email.string' => 'Trebuie sa introduceti o adresa de email valida',

            'password.required' => 'Trebuie sa introduceti obligatoriu o parola',
            'password.string' => 'Parola introdusa nu este valida',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        if (!Auth::guard('staff')->attempt($this->only('email', 'password'))) {
            RateLimiter::hit($this->throttleKey(), 300);


            Alert::error('Date logare invalide', 'Atentie! Aveti la dispozitie un numar limitat de incercari de logare')->persistent(true, false);
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        event(new Lockout($this));


        $seconds = RateLimiter::availableIn($this->throttleKey());
        Alert::error('Logare suspendata temporar', 'Trebuie sa asteptati un numar de ' . ceil($seconds / 60) .
            'minute pentru a incerca o noua logare')->persistent(true, false);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
