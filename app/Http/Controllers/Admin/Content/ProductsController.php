<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\content\Brand;
use App\Models\content\Product;
use App\Models\content\Section;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Content\ProductsAddRequest;

class ProductsController extends Controller
{
    //
    public function listProducts()
    {
        return view('admin.content.products.list');
    }

    //afisam pagina pentru crearea unui nou produs
    public function newProduct()
    {
        $sections = Section::all(['id', 'name'])->sortBy('name');
        $brands = Brand::all(['id', 'name'])->sortBy('name');

        if ($sections->count() < 1) {
            return back()->with('error', 'Nu exista nici o sectiune a sitului pentru a introduce produse');
        }
        return view('admin.content.products.new')
            ->with('sections', $sections)
            ->with('brands', $brands);
    }

    public function addProduct(ProductsAddRequest $request)
    {
        //validam slug-ul
        $request->validate([
            'slug' => 'required|max:255|unique:products,slug',
        ], [
            'slug.required' => 'Orice produs trebuie sa aiba un slug unic',
            'slug.unique' => 'Orice produs trebuie sa aiba un slug unic',
        ]);



        $product = new Product;

        if ($request->hasFile('photo')) {
            //obtinem extensia fisierului
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = Str::slug($request->name) . '_' . $request->id  . '_' . Str::random(3) . '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/products', $photo_name);

            $product->photo = $photo_name;
        }

        $product->section_id = $request->section_id;
        $product->brand_id = $request->brand_id;

        $product->name = $request->name;
        $product->slug = $request->slug;

        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

        $product->excerpt = $request->excerpt;
        $product->presentation = $request->presentation;

        $product->active = $request->active;
        $product->promo = $request->promo;
        $product->position = $request->position;
        $product->views = $request->views;

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();

        Alert::success('Produsul a fost creat', 'Produsul ' . $request->name . ' a fost introdus in baza de date!')->persistent(true, false);

        return redirect(route('products.list'))->with('success', 'Produsul ' . $request->name . ' a fost introdus in baza de date!');
    }

    public function editProduct($id, $currentPage = 1)
    {

        $sections = Section::all(['id', 'name'])->sortBy('name');
        $brands = Brand::all(['id', 'name'])->sortBy('name');


        $product = Product::findOrFail($id);
        return view('admin.content.products.edit')
            ->with('product', $product)
            ->with('sections', $sections)
            ->with('brands', $brands)
            ->with('currentPage', $currentPage);
    }

    public function updateProduct(ProductsAddRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->change_slug) {
            //validarea slug-ului
            $request->validate([
                'slug' => 'required|max:255|unique:products,slug,' . $id,
            ]);
        }

        if ($request->hasFile('photo')) {
            //stergem vechea fotografie a categoriei
            if (!($product->photo == 'product.jpg')) {
                File::delete($product->photoPath());
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = Str::slug($request->name) . '_' . $request->id . '_' . Str::random(3) .  '.' . $extension;
            //georgescu_263454328.jpg

            $request->file('photo')->move('content/products', $photo_name);

            $product->photo = $photo_name;
        }

        $product->section_id = $request->section_id;
        $product->brand_id = $request->brand_id;

        $product->name = $request->name;
        if ($request->change_slug) {
            $product->slug = Str::slug($request->slug);
        }

        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;

        $product->excerpt = $request->excerpt;
        $product->presentation = $request->presentation;

        $product->active = $request->active;
        $product->promo = $request->promo;
        $product->position = $request->position;
        $product->views = $request->views;

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();

        $message = 'Produsul ' . $request->name . ' a fost modificat cu succes!';
        Alert::success(
            'Modificarile au fost salvate',
            $message
        )->persistent(true, false);

        return redirect()->back()
            ->with('success', $message);
    }

    public function photosProducts($id, $currentPage = 1)
    {
        $product = Product::findOrFail($id);
        return view('admin.content.products.photos')
            ->with('product', $product)
            ->with('currentPage', $currentPage);
    }
}
