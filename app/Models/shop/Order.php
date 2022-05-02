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

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
