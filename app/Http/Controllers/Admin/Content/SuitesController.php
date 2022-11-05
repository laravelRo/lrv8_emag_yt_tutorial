<?php

namespace App\Http\Controllers\admin\content;

use Illuminate\Http\Request;
use App\Models\content\Brand;
use App\Models\content\Suite;
use App\Models\content\Section;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SuitesController extends Controller
{
    public function listSuites()
    {


        $brands = Brand::select(['id', 'name'])->orderBy('name')->get();
        $sections = Section::select(['id', 'name'])->orderBy('name')->get();

        return view('admin.content.suites.list')

            ->with('brands', $brands)
            ->with('sections', $sections);
    }

    //adaugam o suita pentru produse
    public function addSuite(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'position' => ['numeric']
            ],
            [
                'name.required' => 'Numele liniei de produse este obligatoriu',
                'name.max' => 'Numele nu poate avea mai mult de 100 de caractere',
                'position.numeric' => 'Pozitia in liste trebuie sa fie un numar intreg'
            ]
        );
        $suite = new Suite;

        $suite->name = $request->name;
        $suite->position = $request->position;
        $suite->brand_id = $request->brand_id;
        $suite->section_id = $request->section_id;

        if ($request->active == 1) {
            $suite->active = 1;
        } else {
            $suite->active = 0;
        }

        $suite->save();

        Alert::success('New product suite', 'Product suite ' . $request->name . ' was created!')->persistent(true, false);
        return redirect()->back();
    }

    public function editSuite($id)
    {
        $suite = Suite::findOrfail($id);
        $brands = Brand::select(['id', 'name'])->orderBy('name')->get();
        $sections = Section::select(['id', 'name'])->orderBy('name')->get();

        return view('admin.content.suites.edit')
            ->with('brands', $brands)
            ->with('sections', $sections)
            ->with('suite', $suite);
    }

    public function updateSuite(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'position' => ['numeric']
            ],
            [
                'name.required' => 'Numele liniei de produse este obligatoriu',
                'name.max' => 'Numele nu poate avea mai mult de 100 de caractere',
                'position.numeric' => 'Pozitia in liste trebuie sa fie un numar intreg'
            ]
        );
        $suite = Suite::findOrfail($id);

        $suite->name = $request->name;
        $suite->position = $request->position;
        $suite->brand_id = $request->brand_id;
        $suite->section_id = $request->section_id;

        if ($request->active == 1) {
            $suite->active = 1;
        } else {
            $suite->active = 0;
        }

        $suite->save();

        Alert::success('Product suite ' . $request->name . ' was updated!')->persistent(true, false);
        return redirect()->back();
    }

    public function deleteSuite($id)
    {
        $suite = Suite::findOrFail($id);
        foreach ($suite->products as $product) {
            $product->suite_id = 0;
            $product->save();
        }
        $suite->delete();
        Alert::success('Product suite ' . $suite->name . ' was deleted!')->persistent(true, false);
        return redirect()->back();
    }
}
