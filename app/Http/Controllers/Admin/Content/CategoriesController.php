<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\content\Section;
use App\Models\content\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Content\CategoriesAddRequest;

class CategoriesController extends Controller
{
    //listarea cateogriilor
    public function listCategories()
    {
        // $categories = Category::all()->sortBy('position');
        $sections = Section::with('categories')->orderBy('position')->get();

        return view('admin.content.categories.list')->with('sections', $sections);
    }

    //afisarea formularului pentru o noua categories
    public function newCategory($id)
    {
        $section = Section::findOrFail($id);
        return view('admin.content.categories.new')
            ->with('section', $section);
    }

    public function addCategory(CategoriesAddRequest $request, $id)
    {
        $request->validate([
            'slug' => 'required|max:255|unique:categories,slug',
        ]);
        $category = new Category;
        //uploadam imaginea daca exista
        if ($request->hasFile('photo')) {
            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/categories', $photo_name);

            $category->photo = $photo_name;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->slug) . '_' . Str::random(4);
        $category->title = $request->title;
        $category->description = $request->description;

        $category->position = $request->position;
        $category->active = $request->active;
        $category->promo = $request->promo;
        $category->icon = $request->icon;

        $category->section_id = $id;

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        $category->save();
        Alert::success('A fost creata o noua categorie', 'Categoria ' . $request->name . ' a fost creata cu succes!')->persistent(true, false);
        return redirect(route('categories.list'))->with('success', 'Categoria ' . $request->name . ' a fost adaugata in baza de date');
    }

    //afisarea formularului de editare a unei categorii
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.content.categories.edit')->with('category', $category);
    }

    //updatarea unei categorii
    public function updateCategory(CategoriesAddRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->change_slug) {
            //validarea slug-ului
            $request->validate([
                'slug' => 'required|max:255|unique:sections,slug,' . $id,
            ]);
        }

        if ($request->hasFile('photo')) {
            //stergem vechea fotografie a categoriei
            if (!($category->photo == 'category.jpg')) {
                File::delete($category->photoPath());
            }

            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/categories', $photo_name);

            $category->photo = $photo_name;
        }

        $category->name = $request->name;
        if ($request->change_slug) {
            $category->slug = Str::slug($request->slug);
        }
        $category->title = $request->title;
        $category->description = $request->description;

        $category->position = $request->position;
        $category->active = $request->active;
        $category->promo = $request->promo;
        $category->icon = $request->icon;

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        $category->save();
        $message = 'Categoria ' . $request->name . ' a fost modificata cu succes!';
        Alert::success(
            'Modificarile au fost salvate',
            $message
        )->persistent(true, false);

        return redirect()->back()
            ->with('success', $message);
    }

    //deschidem formularul pentru adaugarea de fotografii
    public function photosCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.content.photos.upload')
            ->with('category', $category);
    }
}
