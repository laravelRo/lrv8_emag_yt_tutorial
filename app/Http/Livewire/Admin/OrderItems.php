<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class OrderItems extends Component
{
    public $order;

    public function approveOrder()
    {

        $this->order->approved_at = now();
        $this->order->save();
    }

    public function uncheckOrder()
    {
        $this->order->approved_at = null;
        $this->order->save();
    }

    public function render()
    {
        return view('livewire.admin.order-items');
    }
}
