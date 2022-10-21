<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suite extends Model
{
    use HasFactory;

    //relatia one-to-many cu produsele
    public function products()
    {
        return $this->hasMany(Product::class, 'suite_id');
    }

    //has one brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    //has one brand
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
