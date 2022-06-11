<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Item extends Component
{
    public $iteration;

    public $item;
    public $show_controls;

    public function addQty()
    {
        $this->item->qty++;
        $this->item->save();

        $this->emitUp('qtyChanged');
    }

    public function subQty()
    {
        if ($this->item->qty > 1) {
            $this->item->qty--;
            $this->item->save();
            $this->emitUp('qtyChanged');
        }
    }

    public function render()
    {
        return view('livewire.admin.item');
    }
}
