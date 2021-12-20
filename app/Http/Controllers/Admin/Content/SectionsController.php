<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\content\Section;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Content\SectionAddRequest;


class SectionsController extends Controller
{
    //listarea sectiunilor
    public function listSections()
    {
        $sections = Section::all()->sortBy('position');
        return view('admin.content.sections.list')->with('sections', $sections);
    }

    //afisam formularul pentru o noua sectiune
    public function newSection()
    {
        return view('admin.content.sections.new');
    }

    //functia pentru crearea unei noi sectiuni
    public function addSection(SectionAddRequest $request)
    {
        $request->validate([
            'slug' => 'required|max:255|unique:sections,slug',
        ]);
        $section = new Section;
        //uploadam imaginea daca exista
        if ($request->hasFile('photo')) {
            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/sections', $photo_name);

            $section->photo = $photo_name;
        }

        $section->name = $request->name;
        $section->slug = Str::slug($request->slug) . '_' . Str::random(4);
        $section->description = $request->description;

        $section->position = $request->position;
        $section->active = $request->active;
        $section->promo = $request->promo;
        $section->icon = $request->icon;

        $section->meta_title = $request->meta_title;
        $section->meta_description = $request->meta_description;
        $section->meta_keywords = $request->meta_keywords;

        $section->save();
        Alert::success('A fost creata o noua sectiune', 'Sectiunea ' . $request->name . ' a fost creata cu succes!')->persistent(true, false);
        return redirect(route('sections.list'))->with('success', 'Sectiunea ' . $request->name . ' a fost adaugata in baza de date');
    }

    public function editSection($id)
    {
        $section = Section::findOrfail($id);
        return view('admin.content.sections.edit')
            ->with('section', $section);
    }

    // ruta pentru updatarea unei sectiuni
    public function updateSection(SectionAddRequest $request, $id)
    {
        if ($request->change_slug) {
            $request->validate([
                'slug' => 'required|max:255|unique:sections,slug,' . $id,
            ]);
        }
        $section = Section::findOrFail($id);
        if ($request->hasFile('photo')) {
            //stergem vechea fotografie a membrului staff
            if (!($section->photo == 'sections.jpg')) {
                File::delete($section->photoPath());
            }

            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/sections', $photo_name);

            $section->photo = $photo_name;
        }

        $section->name = $request->name;
        if ($request->change_slug) {
            $section->slug = Str::slug($request->slug);
        }
        $section->description = $request->description;

        $section->position = $request->position;
        $section->active = $request->active;
        $section->promo = $request->promo;
        $section->icon = $request->icon;

        $section->meta_title = $request->meta_title;
        $section->meta_description = $request->meta_description;
        $section->meta_keywords = $request->meta_keywords;

        $section->save();
        Alert::success(
            'Modificarile au fost salvate',
            'Sectiunea ' . $request->name . ' a fost updatata cu succes!'
        )->persistent(true, false);

        return redirect()->back()
            ->with('success', 'Sectiunea ' . $request->name . ' a fost updatata cu succes!');
    }
}
