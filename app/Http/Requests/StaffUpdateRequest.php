<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('staff')->ignore($this->id)],
            'phone' => 'max:150|nullable',
            'type' => 'required|max:30',
            'photo' => 'nullable|image|max:1024|',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trebuie sa introduceti un nume pentru noul membru staff',
            'name.max' => 'Numele noului membru nu poate avea mai mult de 50 de caractere',
            'email.required' => 'Trebuie sa introduceti o adresa de email valida',
            'email.unique' => 'Aceasta adresa de email este deja inregistrata pe site',
            'email.email' => 'Trebuie sa introduceti o adresa de email valida',
            'phone.max' => 'Numelerele de telefon trebuie sa aiba maximum 150 de caractere',
            'type.required' => 'Trebuie sa selectati un rol pentru membrul staff',
            'photo.image' => 'Fisierul selectat trebuie sa fie de tip .jpg, .bmp, .gif sau alt tip de imagine',
            'photo.max' => 'Imaginea selectata nu poate avea mai mult de 1 Mb',

        ];
    }
}
