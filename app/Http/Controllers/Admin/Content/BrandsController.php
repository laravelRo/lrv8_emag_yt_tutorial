<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\content\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Content\BrandsAddRequest;

class BrandsController extends Controller
{
    public function listBrands()
    {
        $brands = Brand::all()->sortBy('position');
        return view('admin.content.brands.list')
            ->with('brands', $brands);
    }

    //afiasm formularul pentru crearea unuin ou Brand
    public function newBrand()
    {
        return view('admin.content.brands.new');
    }

    //adaugarea unui nou Brand in baza de date
    public function addBrand(BrandsAddRequest $request)
    {
        //validam slug-ul
        $request->validate([
            'slug' => 'required|max:255|unique:brands,slug',
        ], [
            'slug.required' => 'Orice Brand trebuie sa aiba un slug unic',
            'slug.unique' => 'Orice Brand trebuie sa aiba un slug unic',
        ]);

        $brand = new Brand;
        //uploadam imaginea daca exista
        if ($request->hasFile('photo')) {
            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/brands', $photo_name);

            $brand->photo = $photo_name;
        }
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->slug) . '_' . Str::random(4);
        $brand->title = $request->title;
        $brand->description = $request->description;

        $brand->position = $request->position;
        $brand->active = $request->active;
        $brand->promo = $request->promo;

        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_keywords = $request->meta_keywords;

        $brand->save();

        Alert::success('A fost creata un nou Brand', 'Brand-ul ' . $request->name . ' a fost introdus in baza de date!')->persistent(true, false);
        return redirect(route('brands.list'))->with('success', 'Brand-ul ' . $request->name . ' a fost introdus in baza de date!');
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.content.brands.edit')->with('brand', $brand);
    }

    public function updateBrand(BrandsAddRequest $request, $id)
    {
        if ($request->change_slug) {
            //validam slug-ul
            $request->validate([
                'slug' => 'required|max:255|unique:brands,slug,' . $id,
            ], [
                'slug.required' => 'Orice Brand trebuie sa aiba un slug unic',
                'slug.unique' => 'Acest slug este deja inregistrat',
            ]);
        }

        $brand =  Brand::findOrFail($id);

        if ($request->hasFile('photo')) {
            //stergem vechea fotografie a categoriei
            if (!($brand->photo == 'brand.jpg')) {
                File::delete($brand->photoPath());
            }

            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/brands', $photo_name);

            $brand->photo = $photo_name;
        }

        $brand->name = $request->name;

        if ($request->change_slug) {
            $brand->slug = Str::slug($request->slug);
        }


        $brand->title = $request->title;
        $brand->description = $request->description;

        $brand->position = $request->position;
        $brand->active = $request->active;
        $brand->promo = $request->promo;

        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_keywords = $request->meta_keywords;

        $brand->save();

        Alert::success('Datele pentru  ' . $request->name . ' au fost actualizate!')->persistent(true, false);

        return back()->with('success', 'Datele au fost actualizate cu succes in baza de date');
    }

    public function photosCategory($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.content.brands.photos')
            ->with('brand', $brand);
    }
}
