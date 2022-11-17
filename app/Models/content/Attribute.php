<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'attributes';


    //relatia one to many cu valorile atributului
    public function values()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }

    //relatia many-to-many catre sectiuni
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'attribute_section', 'attribute_id', 'section_id');
    }

    //relatia polimorfica many-to-many atribute-produse
    public function products()
    {
        return $this->morphedByMany(Product::class, 'attributable');
    }
}
