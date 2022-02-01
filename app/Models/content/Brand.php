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
