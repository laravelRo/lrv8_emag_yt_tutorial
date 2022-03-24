<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\shop\Cart;
use App\Models\content\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddCart extends Component
{
    public $product_id;

    public function addToCart()
    {

        //========================
        // utilizatorul este logat
        //========================
        if (Auth::check()) {
            $productCount = Product::where('user_id', Auth::id())
                ->where('product_id', $this->product_id)
                ->count();
            if ($productCount > 0) {

                $message = 'Produsul ' . Product::select('name')
                    ->where('id', $this->product_id)
                    ->first()->name .
                    ' exista deja in cosul Dvs!';

                $this->emit('productInCart', $message);
            } else {
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->product_id = $this->product_id;
                $cart->save();

                $this->emitTo('products.count-cart', 'countProducts');

                $message = 'Produsul ' . Product::select('name')
                    ->where('id', $this->product_id)
                    ->first()->name .
                    ' a fost adaugat in cosul Dvs!';
                $this->emit('productAdded', $message);
            }
        }
        //========================
        // utilizatorul este guest
        //========================
        else {
            // inseram un produs in cos pentru utilizatorul nelogat
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                session(['session_id' => $session_id]);
            }

            //verificam daca produsul exista in cosul acestui utilizator
            $product = Cart::where('product_id', $this->product_id)->where('session_id', Session::getId())->count();
            if ($product > 0) {

                $message = 'Produsul ' . Product::select('name')
                    ->where('id', $this->product_id)
                    ->first()->name .
                    ' exista deja in cosul Dvs!';
                $this->emit('productInCart', $message);
            } else {
                $cart = new Cart;
                $cart->session_id = Session::getId();
                $cart->product_id = $this->product_id;
                $cart->save();

                $this->emitTo('products.count-cart', 'countProducts');

                $message = 'Produsul ' . Product::select('name')
                    ->where('id', $this->product_id)
                    ->first()->name .
                    ' a fost adaugat in cosul Dvs!';
                $this->emit('productAdded', $message);
            }
        }
    }

    public function render()
    {
        return view('livewire.products.add-cart');
    }
}
