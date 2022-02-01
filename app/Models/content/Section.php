<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    //has many categories
    public function categories()
    {
        return $this->hasMany(Category::class, 'section_id')->orderBy('position');
    }

    //has many products
    public function products()
    {
        return $this->hasMany(Product::class, 'section_id');
    }

    public function photoUrl()
    {
        return '/content/sections/' . $this->photo;
    }
    public function photoPath()
    {
        return 'content/sections/' . $this->photo;
    }
}
