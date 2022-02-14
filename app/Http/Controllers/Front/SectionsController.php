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
        $section = Section::withCount('products')
            ->where('slug', $slug)->first();
        return view('front.content.section')
            ->with('section', $section)
            ->with('open', 0);
    }

    //afisam produsele unei sectiuni
    public function showSectionProducts($slug)
    {
        $section = Section::with('products')->where('slug', $slug)->first();
        $products = $section->products()->orderBy('name')->paginate(12);
        return view('front.content.section-products')
            ->with('section', $section)
            ->with('products', $products)
            ->with('open', 0);
    }

    //afisam pagina unei categorii
    public function showCategory($slug)
    {

        $category = Category::withCount('products')
            ->where('slug', $slug)->first();

        //obtinem sectiunea categoriei
        $section = $category->section;
        // obtinem lsita de categorii care sa fie afisata in bara laterala
        $listCategories = $section->categories()->whereNotIn('id', [$category->id])->get();

        // obtinem produsele favorite ale categoriei
        $promo_products = $category->products()->where('promo', 1)->orderBy('name')->get();


        return view('front.content.category')
            ->with('category', $category)
            ->with('listCategories', $listCategories)
            ->with('promo_products', $promo_products)
            ->with('open', false);
    }
    public function showCategoryProducts($slug)
    {
        $category = Category::withCount('products')->where('slug', $slug)->first();
        $products = $category->products()->orderBy('name')->paginate(12);
        return view('front.content.category-products')
            ->with('category', $category)
            ->with('products', $products)

            ->with('open', false);
    }
}
