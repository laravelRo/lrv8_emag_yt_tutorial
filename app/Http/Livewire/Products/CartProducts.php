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
        if ($coupon->expired_at <= now()) {
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

        //pentru coupoanele de categorii verificam daca in cos exista vreun produs cu una dintre cateogriile couponului
        if ($coupon->coupon_type == 2) {

            //obtinem o colectie cu id-urile categoriilor couponului
            $coupon_categs_ids = $coupon->categories->pluck('id');

            $check = 0;
            foreach (Cart::cartProducts() as $cart_item) {
                //iteram prin categoriile fiecarui produs
                foreach ($cart_item->product->categories as $prod_categ) {
                    if ($coupon_categs_ids->contains($prod_categ->id)) {
                        $check = 1;
                        break;
                    }

                    if ($check == 1) {
                        break;
                    }
                }
            }

            if ($check == 0) {
                $this->user_message = "Acest coupon nu se poate aplica produselor din cos";
                $this->code = null;
                return;
            }
        }

        //verificam daca produsele din cos apartin brandurilor couponului
        if ($coupon->coupon_type == 4) {
            //obtin o colectie cu id-urile brandurilor atasate couponului
            $coupon_brands_ids = $coupon->brands->pluck('id');

            $brand_check = 0;

            foreach (Cart::cartProducts() as $cart_item) {

                if ($coupon_brands_ids->contains($cart_item->product->brand->id)) {
                    $brand_check = 1;
                    break;
                }
            }


            if ($brand_check == 0) {
                $this->user_message = "Acest coupon nu se poate aplica produselor din cos";
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
