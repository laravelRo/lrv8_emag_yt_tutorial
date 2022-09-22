<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\content\Section;
use App\Models\content\Attribute;
use App\Http\Controllers\Controller;
use App\Models\content\AttributeValue;
use RealRashid\SweetAlert\Facades\Alert;

class AttributesController extends Controller
{
    //listam atributele sitului
    public function listAttributes()
    {
        return view('admin.content.attributes.list');
    }

    public function addAttributes(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'max:50'],
                'position' => ['numeric']
            ],
            [
                'name.required' => 'Trebuie sa introduceti un nume pentru atribute',
                'name.max' => 'Numele nu poate avea mai mult de 50 de caractere',
                'position.numeric' => 'Valoarea pozitiei in liste trebuie sa fie un numar',
            ]
        );

        $attribute = new Attribute;

        $attribute->name = $request->name;
        $attribute->position = $request->position;
        if ($request->active) {
            $attribute->active = true;
        } else {
            $attribute->active = false;
        }

        $attribute->save();

        // afisam mesaj sweetalert
        Alert::success('A fost creat un nou atribut', 'Atributul ' . $request->name . ' a fost creat cu succes!')
            ->persistent(true, false);
        return back();
    }

    public function addValue(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'max:50'],
                'position' => ['numeric']
            ],
            [
                'name.required' => 'Trebuie sa introduceti un nume pentru valoarea atributului',
                'name.max' => 'Numele nu poate avea mai mult de 50 de caractere',
                'position.numeric' => 'Valoarea pozitiei in liste trebuie sa fie un numar',
            ]
        );

        $value = new AttributeValue;

        $value->attribute_id = $id;
        $value->name = $request->name;
        $value->position = $request->position;

        if ($request->active) {
            $value->active = true;
        } else {
            $value->active = false;
        }
        $value->save();

        Alert::success('A fost adaugata noua valoare', $request->name . ' a fost adaugata pentru atributul produsului')
            ->persistent(true, false);
        return back();
    }

    public function setSectionAttribute($id)
    {
        $section = Section::findOrFail($id);
        $attributes = Attribute::all()->sortBy('name');
        return view('admin.content.attributes.section-attributes')
            ->with('section', $section)
            ->with('attributes', $attributes);
    }

    public function syncSectionAttribute(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->attributes()->sync($request->attids);
        Alert::success('Atributele sectiunii', $section->name . ' au fost actualizate')
            ->persistent(true, false);
        return back();
    }
}
