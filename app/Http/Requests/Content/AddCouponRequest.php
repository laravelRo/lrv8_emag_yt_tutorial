<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponRequest extends FormRequest
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
            'code' => ['required'],
            'value' => ['numeric', 'required'],
            'amount' => ['nullable', 'numeric'],
            'description' => ['nullable', 'max:500'],
            'expired_at' => ['required', 'date']
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Trebuie sa introduceti un cod al couponului',
            // 'code.unique' => 'Acest cod este deja utilizat in baza de date',
            'amount.numeric' => 'Valoarea comenzii minime trebuie sa fie numerica',
            'value.numeric' => 'Valoarea couponului trebuie sa fie numerica',
            'value.required' => 'Trebuie sa introduceti o valoare pentru coupon',
            'description.max' => 'Descrierea couponului trebuie sa aiba maximum 500 de caractere',
            'expired_at.required' => 'Trebuie sa introduceti o data de expirare a couponului',
            'expired_at.date' => 'Trebuie sa introduceti o data calendaristica valida',
        ];
    }
}
