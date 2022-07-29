<?php

namespace App\Models\shop;

use App\Models\User;
use App\Models\content\Brand;
use App\Models\content\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    //relatia inversa many-to-many polimorfica cu utilizatorii
    public function users()
    {
        return $this->morphedByMany(User::class, 'couponable');
    }

    //relatia inversa many-to-many polimorfica cu brandurile
    public function brands()
    {
        return $this->morphedByMany(Brand::class, 'couponable');
    }

    //relatia inversa many-to-many polimorfica cu categoriile
    public function categories()
    {
        return $this->morphedByMany(Category::class, 'couponable');
    }
}
