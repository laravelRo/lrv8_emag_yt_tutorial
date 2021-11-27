<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\content\Section;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    //afisam pagina home
    public function homePage()
    {

        return view('front.home')
            ->with('open', true);
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
