<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    //has one section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    //has many products
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }

    //has many photos polimorphic
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }



    public function photoUrl()
    {
        return '/content/categories/' . $this->photo;
    }
    public function photoPath()
    {
        return 'content/categories/' . $this->photo;
    }

    public function galleryUrl()
    {
        return '/photos/categories/' . $this->id . '/';
    }
}
