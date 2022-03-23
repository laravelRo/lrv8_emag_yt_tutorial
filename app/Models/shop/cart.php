<?php

namespace App\Models\shop;

use App\Models\content\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    //functia statica care intoarce produsele aflate in cos
    public static function cartProducts()
    {
        if (Auth::check()) {
            $cartProducts = Cart::with(['product' => function ($query) {
                $query->select('id', 'name', 'photo', 'slug', 'price', 'stock');
            }])->where('user_id', Auth::id())->orderByDesc('created_at')->get();
        } else {
            $cartProducts = Cart::with(['product' => function ($query) {
                $query->select('id', 'name', 'slug', 'photo', 'price', 'stock');
            }])->where('session_id', Session::getId())->orderByDesc('created_at')->get();
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
}
