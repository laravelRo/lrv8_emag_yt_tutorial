<?php

namespace App\Models\shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'approved_at' => 'datetime',
        'payed_at' => 'datetime',
        'recivied_at' => 'datetime',

    ];

    //relatia one-to-many order order_items
    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    //totalul comenzii
    public function totalCost()
    {
        $total = 0;

        foreach ($this->order_items as $item) {
            $total += $item->price * $item->qty;
        }

        $total += $this->shipping_cost;

        return $total;
    }

    //relatia inversa one-to-many Orders Users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relatia one-to-one cu discount-ul
    public function discount()
    {
        return $this->hasOne(OrderDiscount::class, 'order_id');
    }
}
