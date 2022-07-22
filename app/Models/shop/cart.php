<?php

namespace App\Models\shop;

use Carbon\Carbon;
use App\Models\content\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    //functia statica care intoarce produsele aflate in cos
    public static function cartProducts()
    {
        if (Auth::check()) {
            $cartProducts = Cart::with(
                [
                    'product' => function ($query) {
                        $query->with([
                            'brand' => function ($query) {
                                $query->select('id', 'name');
                            }
                        ]);
                    }
                ]
            )->where('user_id', Auth::id())->orderByDesc('created_at')->get();
        } else {
            $cartProducts = Cart::with(
                [
                    'product' => function ($query) {
                        $query->with([
                            'brand' => function ($query) {
                                $query->select('id', 'name');
                            }
                        ]);
                    }
                ]
            )->where('session_id', Session::getId())->orderByDesc('created_at')->get();
        }

        return $cartProducts;
    }

    //functia statica ce realizeaza totalul costului pentru produsele din cos
    public static function totalCart()
    {
        $cartProducts = Cart::cartProducts();
        $total = 0;

        foreach ($cartProducts as $item) {
            $total += $item->product->price * $item->qty;
        }
        return $total;
    }

    //functia statica care calculeaza discount-ul
    public static function cartDiscount()
    {

        if (Session::get('coupon_active')) {

            $coupon_active = Session::get('coupon_active');

            //verific daca couponul este general sau user (coupon_type==1,3)
            if ($coupon_active['coupon_type'] == 1 || $coupon_active['coupon_type'] == 3) {
                if ($coupon_active['percent']) {
                    return Cart::totalCart() * $coupon_active['value'] / 100;
                } else {
                    return $coupon_active['value'];
                }
            }

            //verific daca couponul este de tip brand
            if ($coupon_active['coupon_type'] == 4) {

                //aflam id-urile brandurilor couponului
                $coupon_brands = Coupon::where('code', $coupon_active['code'])->first();
                $coupon_brands_ids = $coupon_brands->brands->pluck('id');

                // dd($coupon_brands_ids);


                //calculam discountul total
                $brands_discount = 0;

                //iteram printre produsele din cos
                foreach (Cart::cartProducts() as $prod) {


                    if ($coupon_brands_ids->contains($prod->product->brand->id)) {

                        if ($coupon_active['percent']) {
                            $brands_discount += $prod->product->price * $prod->qty * $coupon_active['value'] / 100;
                        } else {
                            $brands_discount += $prod->qty * $coupon_active['value'];
                        }
                    }
                }

                return $brands_discount;
            }
        } else {
            return 0;
        }
    }




    //functia statica pentru actualizarea cosului la logarea unui utilizator
    public static function updateUserCart()
    {
        if (!empty(Session::get('session_id'))) {
            //avem produse ale utilizatorului nelogat in cos
            Cart::where('session_id', Session::get('session_id'))
                ->update(['user_id' => Auth::id(), 'session_id' => null]);
        }
    }

    //public function emty cart - golim cosul de cumparaturi
    public static function emtyCart()
    {
        $result = Cart::where('user_id', Auth::id())->delete();
        return $result;
    }

    //functia care intoarce numarul de produse expirate ale guest
    public static function countExpiredGuests()
    {
        $count = Cart::where('user_id', null)
            ->where('created_at', '<=', Carbon::now()->subDays(3)->toDateTimeString())
            ->count();
        return $count;
    }
}
