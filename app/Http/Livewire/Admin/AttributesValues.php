<?php

namespace App\Http\Livewire\Admin;

use App\Models\content\Attribute;
use App\Models\content\AttributeValue;


use Livewire\Component;

class AttributesValues extends Component
{
    protected $listeners = ['positionUp' => '$refresh', 'deleteValue', 'deleteAttribute'];

    public $nameId = null;

    public $activeName = "";

    public $editValueId = null;

    public $valueName = null;
    public $valuePosition = null;
    public $valueActive = 0;


    public function showName($id)
    {
        $attribute = Attribute::findOrFail($id);
        $this->nameId = $attribute->id;
        $this->activeName = $attribute->name;
    }

    public function updatedActiveName($value)
    {
        $attribute = Attribute::findOrFail($this->nameId);
        $attribute->name = $value;
        $attribute->save();

        $this->nameId = null;
    }

    public function editValue($id)
    {
        $this->editValueId = $id;
        $value = AttributeValue::findOrFail($id);
        $this->valueName = $value->name;
        $this->valuePosition = $value->position;
        $this->valueActive = $value->active;

        // dd($value);
    }

    public function updateValue($id)
    {
        $value = AttributeValue::findOrFail($id);

        $value->name = $this->valueName;
        $value->position = $this->valuePosition;
        $value->active = $this->valueActive;

        $value->save();
        $this->editValueId = null;
    }

    public function deleteValue($id)
    {
        $value = AttributeValue::findOrfail($id)->delete();
    }

    public function deleteAttribute($id)
    {
        $value = Attribute::findOrfail($id)->delete();
    }

    public function render()
    {
        $attributes = Attribute::all()->sortBy('position');

        return view('livewire.admin.attributes-values')
            ->with('attributes', $attributes);
    }
}
