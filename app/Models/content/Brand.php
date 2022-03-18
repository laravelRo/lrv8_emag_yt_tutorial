<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    //has many products
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    //public products available for shopping
    public function publicProducts()
    {
        return $this->hasMany(Product::class, 'brand_id')
            ->where('active', true)
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->paginate(12);
    }

    public function getUrlAttribute()
    {
        return '/content/brands/' . $this->photo;
    }
    public function photoUrl()
    {
        return '/content/brands/' . $this->photo;
    }

    public function photoPath()
    {
        return 'content/brands/' . $this->photo;
    }

    //has many photos polimorphic
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function galleryUrl()
    {
        return '/photos/brands/' . $this->id . '/';
    }
}
