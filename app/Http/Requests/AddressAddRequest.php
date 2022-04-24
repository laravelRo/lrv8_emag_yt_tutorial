<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressAddRequest extends FormRequest
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
            'name' => ['required', 'max:100', 'string'],
            'phone' => ['max:255'],
            'city' => ['required', 'max:100', 'string'],
            'address' => ['required', 'max:255'],
            'observations' => ['max:500']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trebuie sa introduceti un nume al destinatarului',
            'name.max' => 'Numele destinatarului nu poate avea mai mult de 100 de caractere',
            'phone.max' => 'Numerele de telefon nu pot avea mai mult de 255 de caractere',
            'city.required' => 'Trebuie sa introduceti numele orasului de destinatie',
            'city.max' => 'Numele orasului nu poate avea mai mult de 100 de caractere',
            'observations.max' => 'Observatiile nu pot avea mai mult de 500 de caractere'
        ];
    }
}
