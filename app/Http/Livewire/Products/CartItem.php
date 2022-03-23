<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\shop\Cart;

class CartItem extends Component
{
    public $item;
    public $qty = 1;

    protected $listeners = [
        'newQty' => '$refresh',
    ];

    public function mount()
    {
        $this->qty = $this->item->qty;
    }

    //actualizez cantitatea unui produs in cos
    public function updatedQty($value)
    {
        if ($value > 0) {
            // $cart = Cart::findOrFail($this->item->id);
            $this->item->qty = $value;
            $this->item->save();

            $this->qty = $value;

            $this->emitSelf('newQty');

            //actualizam totalul
            $this->emitTo('products.cart-products', 'newTotal');
        }
    }

    //incrementez cantitatea unui produs din cos
    public function qtyAdd()
    {
        if ($this->qty > 0) {
            // $cart = Cart::findOrFail($this->item->id);
            $this->item->qty++;
            $this->item->save();

            $this->qty++;
            $this->emitSelf('newQty');

            //actualizam totalul
            $this->emitTo('products.cart-products', 'newTotal');
        }
    }

    //decrementez cantitatea unui produs din cos
    public function qtySub()
    {
        if ($this->qty > 1) {
            // $cart = Cart::findOrFail($this->item->id);
            $this->item->qty--;
            $this->item->save();

            $this->qty--;
            $this->emitSelf('newQty');

            $this->emitTo('products.cart-products', 'newTotal');
        }
    }


    public function render()
    {
        return view('livewire.products.cart-item');
    }
}
