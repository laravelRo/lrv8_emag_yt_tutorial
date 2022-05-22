<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
