<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // has one section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    // has many cateogries
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    //has one Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    //has one Suite
    public function suite()
    {
        return $this->belongsTo(Suite::class, 'suite_id', 'id');
    }

    //has many photos polimorphic
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    //url to product photo
    public function photoUrl()
    {
        return '/content/products/' . $this->photo;
    }

    //path to product photo
    public function photoPath()
    {
        return 'content/products/' . $this->photo;
    }

    //path to photo gallery
    public function galleryUrl()
    {
        return '/photos/products/' . $this->id . '/';
    }
}
