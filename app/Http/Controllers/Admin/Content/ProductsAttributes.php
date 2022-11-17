<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\content\Product;
use App\Http\Controllers\Controller;

class ProductsAttributes extends Controller
{
    //afisam pagina de selectare a valorilor pentru atributele unui produs
    public function showProductsAttributes($id, $currentPage = 1)
    {

        $product = Product::findOrFail($id);
        $attributes = $product->section->attributes()
            ->with(['values' => function ($query) {
                $query->orderBy('position');
            }])->orderBy('name')->get();


        return view('admin.content.attributes.product-attributes')
            ->with('product', $product)
            ->with('attributes', $attributes)

            ->with('currentPage', $currentPage);
    }
}
