<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\content\Product;
use App\Models\content\Section;
use App\Models\content\Category;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    //afisam pagina home
    public function homePage()
    {
        $trandy_products = Product::all('name', 'price', 'discount', 'photo', 'slug', 'brand_id')
            ->sortByDesc('views')->take(4);

        $trandy_categories = Category::select('name', 'photo', 'slug')->withCount(['products'])
            ->where('promo', '=', 1)
            ->limit(6)
            ->get();


        return view('front.home')
            ->with('open', true)
            ->with('trandy_products', $trandy_products)
            ->with('trandy_categories', $trandy_categories);
    }

    public function shopPage()
    {
        return view('front.shop');
    }

    public function productPage()
    {
        return view('front.product');
    }

    public function contactPage()
    {
        return view('front.contact');
    }

    public function cartPage()
    {
        return view('front.cart');
    }
    public function checkPage()
    {
        return view('front.check');
    }
}
