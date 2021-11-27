<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\content\Section;
use App\Models\content\Category;
use App\Http\Controllers\Controller;

class SectionsController extends Controller
{
    //afisam pagina unei sectiuni
    public function showSection($slug)
    {
        $section = Section::where('slug', $slug)->first();
        return view('front.content.section')
            ->with('section', $section)
            ->with('open', 0);
    }

    //afisam pagina unei sectiuni
    public function showCategory($slug)
    {

        $category = Category::where('slug', $slug)->first();

        //obtinem sectiunea categoriei
        $section = $category->section;
        // obtinem lsita de categorii care sa fie afisata in bara laterala
        $listCategories = $section->categories()->whereNotIn('id', [$category->id])->get();


        return view('front.content.category')
            ->with('category', $category)
            ->with('listCategories', $listCategories)
            ->with('open', false);
    }
}
