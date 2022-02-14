<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\content\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //ruta principala pentru un produs
    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->views++;
        $product->save();

        $related_products = $product->section->products->sortByDesc('views')->take(4);
        return view('front.content.product')
            ->with('related_products', $related_products)
            ->with('product', $product);
    }
}
