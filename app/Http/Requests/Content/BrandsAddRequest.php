<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class BrandsAddRequest extends FormRequest
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
            // 'slug' => 'required|unique:sections,slug',
            // 'description' => 'nullable',
            'title' => 'nullable|max:255',

            'position' => 'numeric|nullable',
            'active' => 'boolean|nullable',
            'promo' => 'boolean|nullable',



            'meta_title' => 'max:255|nullable',
            'meta_description' => 'max:255|nullable',
            'meta_keywords' => 'max:255|nullable',

            'photo' => 'nullable|image|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trebuie sa introduceti un nume pentru noul Brand',
            'name.max' => 'Numele Brand-ului nu poate avea mai mult de 50 de caractere',
            'title.max' => 'Titlul categoriei nu poate avea mai mult de 255 de caractere',

            'position.numeric' => 'Valoarea campului position trebuie sa fie un numar intreg',

            'meta_title.max' => 'Campul meta title al sectiunii nu poate avea mai mult de 255 de caractere',
            'meta_description.max' => 'Campul meta description al sectiunii nu poate avea mai mult de 255 de caractere',
            'meta_keywords.max' => 'Campul meta keywords al sectiunii nu poate avea mai mult de 255 de caractere',

            'photo.image' => 'Fisierul selectat trebuie sa fie de tip .jpg, .bmp, .gif sau alt tip de imagine',
            'photo.max' => 'Imaginea selectata nu poate avea mai mult de 1 Mb',

        ];
    }
}
