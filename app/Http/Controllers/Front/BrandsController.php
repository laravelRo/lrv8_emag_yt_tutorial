<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\content\Brand;
use App\Http\Controllers\Controller;
use App\Models\content\promo_products;

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
        $brand = Brand::withCount('products')->where('slug', $slug)->first();
        $promo_products = $brand->products->sortBy('views')->take(3);
        return view('front.content.brand')
            ->with('brand', $brand)
            ->with('promo_products', $promo_products);
    }
    public function viewBrandProducts($slug)
    {
        $brand = Brand::withCount('products')
            ->where('slug', $slug)
            ->first();
        $products = $brand->products()->orderBy('name')->paginate(12);

        return view('front.content.brand-products')
            ->with('brand', $brand)
            ->with('products', $products);
    }
}
