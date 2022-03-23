<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\shop\Cart;

class CartProducts extends Component
{
    public $cartProducts;
    public $totalCart;

    protected $listeners = ['deleteItemCart', 'newTotal' => '$refresh'];

    public function deleteItemCart($id)
    {
        $cart = Cart::findOrFail($id)->delete();

        $this->emitTo('products.count-cart', 'countProducts');
    }

    public function render()
    {
        $this->cartProducts = Cart::cartProducts();
        $this->totalCart = Cart::totalCart();

        return view('livewire.products.cart-products');
    }
}
