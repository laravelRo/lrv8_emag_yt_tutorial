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

    //public products available for shopping
    public function publicProducts()
    {
        return $this->hasMany(Product::class, 'section_id')
            ->where('active', true)
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->paginate(12);
    }



    public function photoUrl()
    {
        return '/content/sections/' . $this->photo;
    }
    public function photoPath()
    {
        return 'content/sections/' . $this->photo;
    }

    //relatia many-to-many catre atribute
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_section', 'section_id', 'attribute_id');
    }
    public function publicAttributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_section', 'section_id', 'attribute_id')
            ->where('active', true)
            ->orderBy('position')
            ->get();
    }
}
