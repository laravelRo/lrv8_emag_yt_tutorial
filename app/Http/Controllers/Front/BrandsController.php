<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\content\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    //pagina cu lista de brand-uri
    public function listBrands()
    {
        $brands = Brand::all()->where('active', true)->sortBy('position');
        return view('front.content.brands')
            ->with('brands', $brands);
    }

    //pagina unui Brand
    public function viewBrand($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        return view('front.content.brand')
            ->with('brand', $brand);
    }
}
