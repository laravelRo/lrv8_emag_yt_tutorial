<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\shop\Coupon;

class Coupons extends Component
{
    public function render()
    {
        $coupons = Coupon::orderByDesc('expired_at')->paginate()->withQuerystring();
        return view('livewire.admin.coupons')
            ->with('coupons', $coupons);
    }
}
