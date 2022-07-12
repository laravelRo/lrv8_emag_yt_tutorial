<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\shop\Cart;
use App\Models\shop\Coupon;
// use Illuminate\Support\Str;

class CartProducts extends Component
{
    public $cartProducts;
    public $totalCart;
    public $discount;

    public $code;

    public $user_message;

    protected $listeners = ['deleteItemCart', 'newTotal' => '$refresh'];

    //aplicarea codului in Cart
    public function applyCode()
    {
        $this->user_message = null;
        session()->forget('coupon_active');

        $this->validate(
            [
                'code' => 'required|min:5'
            ],
            [
                'code.required' => 'Nu ati introdus nici un cod pentru validare',
                'code.min' => 'Codul couponului trebuie sa aiba minim 5 caractere',
            ]
        );


        //verificam codul couponului
        $coupon = Coupon::where('code', trim($this->code))->first();
        if (!$coupon) {
            $this->user_message = "Codul introdus nu este valid";
            $this->code = null;
            return;
        }

        //verificam daca couponul este activ
        if (!$coupon->active) {
            $this->user_message = "Couponul pentru acest cod nu este activ!";
            $this->code = null;
            return;
        }
        //verificam daca couponul este actual (nu a expirat)
        if ($coupon->expired_at < now()) {
            $this->user_message = "Couponul pentru acest cod a expirat!";
            $this->code = null;
            return;
        }


        //verificam daca couponul are suma minima a comenzii
        if ($coupon->amount >= Cart::totalCart()) {
            $this->user_message = "Costul produselor trebuie sa fie minim: " .  $coupon->amount;
            $this->code = null;
            return;
        }

        //verificam ca apartine utilizatorului curent
        if ($coupon->coupon_type == 3) {
            $coupon_users = $coupon->users;
            $actual_user = $coupon_users->where('id', auth()->id())->first();
            if (!$actual_user) {
                $this->user_message = "Nu puteti utiliza acest coupon!";
                $this->code = null;
                return;
            }
        }



        session()->put('coupon_active', [
            'code' => $coupon->code,
            'coupon_type' => $coupon->coupon_type,
            'description' => $coupon->description,
            'percent' => $coupon->percent,
            'value' => $coupon->value,
            'amount' => $coupon->amount,
        ]);
    }

    //anularea couponului activ
    public function removeCoupon()
    {
        session()->forget('coupon_active');
    }

    public function deleteItemCart($id)
    {
        $cart = Cart::findOrFail($id)->delete();

        $this->emitTo('products.count-cart', 'countProducts');
    }

    public function render()
    {
        $this->cartProducts = Cart::cartProducts();
        $this->totalCart = Cart::totalCart();
        $this->discount = Cart::cartDiscount();


        return view('livewire.products.cart-products');
    }
}
