<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ProductsAddRequest extends FormRequest
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

            'name' => 'required|max:255',
            'section_id' => 'required|numeric',
            'brand_id' => 'nullable|numeric',
            // 'slug' => 'required|unique:sections,slug',
            'excerpt' => 'nullable|max:700',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discount' => 'required|numeric|max:100',

            'position' => 'nullable|numeric',
            'active' => 'boolean',
            'promo' => 'boolean',
            'views' => 'nullable|numeric',


            'meta_title' => 'max:255|nullable',
            'meta_description' => 'max:255|nullable',
            'meta_keywords' => 'max:255|nullable',

            'photo' => 'nullable|image|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trebuie sa introduceti un nume pentru produs',
            'name.max' => 'Numele sectiunii nu poate avea mai mult de 255 de caractere',
            'slug.required' => 'Trebuie sa introduceti o valoare pentru campul slug',
            'slug.unique' => 'Adresa url din slug este deja inregistrata!',
            'excerpt.max' => 'Descrierea produsului nu poate avea mai mult de 255 de caractere',


            'price.numeric' => 'Valoarea campului price trebuie sa fie un numar intreg',
            'price.required' => 'Trebuie sa introduceti o valoare pentru campul price',
            'stock.numeric' => 'Valoarea campului stock trebuie sa fie un numar intreg',
            'views.numeric' => 'Valoarea campului views trebuie sa fie un numar intreg',
            'discount.numeric' => 'Valoarea campului discount trebuie sa fie un numar intreg',
            'position.numeric' => 'Valoarea campului position trebuie sa fie un numar intreg',

            'meta_title.max' => 'Campul meta title al sectiunii nu poate avea mai mult de 255 de caractere',
            'meta_description.max' => 'Campul meta description al sectiunii nu poate avea mai mult de 255 de caractere',
            'meta_keywords.max' => 'Campul meta keywords al sectiunii nu poate avea mai mult de 255 de caractere',

            'photo.image' => 'Fisierul selectat trebuie sa fie de tip .jpg, .bmp, .gif sau alt tip de imagine',
            'photo.max' => 'Imaginea selectata nu poate avea mai mult de 1 Mb',

        ];
    }
}
