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
        $brand = Brand::where('slug', $slug)->first();


        $popular_products = $brand->products()
            ->where('active', true)
            ->orderByDesc('views')
            ->limit(3)
            ->get();
        // ->random(3);

        $promo_products = $brand->products()
            ->where('active', true)
            ->where('promo', true)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        // ->random(3);

        $brand_coupons = $brand->coupons()
            ->select('code', 'description')
            ->where('active', true)
            ->where('expired_at', '>=', now())
            ->get();



        return view('front.content.brand')
            ->with('brand', $brand)
            ->with('popular_products', $popular_products)
            ->with('promo_products', $promo_products)
            ->with('brand_coupons', $brand_coupons);
    }

    public function viewBrandProducts($slug)
    {
        $brand = Brand::withCount('products')
            ->where('slug', $slug)
            ->first();
        $products = $brand->publicProducts();

        $brand_coupons = $brand->coupons()
            ->select('code', 'description')
            ->where('active', true)
            ->where('expired_at', '>=', now())
            ->get();

        return view('front.content.brand-products')
            ->with('brand', $brand)
            ->with('products', $products)
            ->with('brand_coupons', $brand_coupons);
    }
}
