<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relatia inversa one-to-many cu atributul valorii
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
