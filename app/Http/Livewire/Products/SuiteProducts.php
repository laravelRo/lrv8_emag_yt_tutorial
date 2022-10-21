<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\content\Suite;
use App\Models\content\Product;

class SuiteProducts extends Component
{
    public $product_id = null;
    public $suite_id;
    public $noProoductText = "";

    public function attachProduct()
    {
        $this->validate([
            'product_id' => ['required', 'numeric']
        ]);

        $product = Product::find($this->product_id);
        if ($product) {
            $product->suite_id = $this->suite_id;
            $product->save();
            $this->noProoductText = null;
        } else {
            $this->noProoductText = "Produsul nu exista in baza de date";
        }
        $this->product_id = null;
    }

    //eliminarea unui produs din suita
    public function removeProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->suite_id = 0;
        $product->save();
    }

    public function render()
    {
        $suite = Suite::findOrFail($this->suite_id);
        $products = $suite->products->sortBy('name');

        return view('livewire.products.suite-products')
            ->with('products', $products);
    }
}
