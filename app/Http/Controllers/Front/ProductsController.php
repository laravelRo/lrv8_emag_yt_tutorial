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

        if ($product->suite_id > 0) {
            $suite_products = Product::select(['id', 'photo', 'slug', 'name'])
                ->where('suite_id', $product->suite_id)
                // ->where('suite_id', '>', 0)
                ->where('id', '<>', $product->id)
                ->orderBy('position')
                ->get();
        } else {
            $suite_products = null;
        }


        // dd($suite_products->count());

        return view('front.content.product')
            ->with('related_products', $related_products)
            ->with('product', $product)
            ->with('suite_products', $suite_products);
    }

    public function searchProduct(Request $request)
    {
        $request->validate(
            [
                'search' => 'required|min:3'
            ],
            [
                'search.required' => 'trebuie sa introduceti cel putin 3 caractere pentru a efectua o cautare',
                'search.min' => 'trebuie sa introduceti cel putin 3 caractere pentru a efectua o cautare'
            ]

        );
        $products = Product::where('active', true)
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('meta_keywords', 'LIKE', "%$request->search%")
            ->orWhere('meta_description', 'LIKE', "%$request->search%")
            ->paginate(12)
            ->withQueryString();

        return view('front.search')
            ->with('products', $products)
            ->with('search_term', $request->search);
    }
}
