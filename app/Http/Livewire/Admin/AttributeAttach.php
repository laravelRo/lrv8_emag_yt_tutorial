<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AttributeAttach extends Component
{
    public $attribute;
    public $product;
    public $attrValue;

    public function mount()
    {
        $attribute = $this->product->attributes()->where('id', $this->attribute->id)->first();
        if ($attribute) {
            $this->attrValue = $attribute->pivot->value;
        }
    }

    public function attachValue($valueName)
    {
        // dd($valueName);
        $this->product->attributes()->detach($this->attribute->id);
        $this->product->attributes()->attach($this->attribute->id, ['value' => $valueName]);

        $this->attrValue = $valueName;
    }
    public function detachAttribute()
    {
        $this->product->attributes()->detach($this->attribute->id);
        $this->attrValue = null;
    }

    public function render()
    {
        return view('livewire.admin.attribute-attach');
    }
}
