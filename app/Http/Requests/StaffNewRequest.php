<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffNewRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'max:150|nullable',
            'type' => 'required|max:30',
            'photo' => 'nullable|image|max:1024',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trebuie sa introduceti un nume pentru noul membru staff',
            'name.max' => 'Numele noului membru nu poate avea mai mult de 50 de caractere',
            'email.required' => 'Trebuie sa introduceti o adresa de email valida',
            'email.unique' => 'Aceasta adresa de email este deja inregistrata pe acest site',
            'phone.max' => 'Numelerele de telefon trebuie sa aiba maximum 150 de caractere',
            'type.required' => 'Trebuie sa selectati un rol pentru membrul staff',
            'photo.image' => 'Fisierul selectat trebuie sa fie de tip .jpg, .bmp, .gif sau alt tip de imagine',
            'photo.max' => 'Imaginea selectata nu poate avea mai mult de 1 Mb',
            'password.required' => 'Trebuie sa setati o parola pentru membru staff',
            'password.min' => 'Parola selectata trebuie sa aiba minimum 8 caractere',
            'password.confirmed' => 'Nu ati confirmat corect parola',
            'password_confirmation.same' => 'Confirmarea parolei este gresita',
        ];
    }
}
