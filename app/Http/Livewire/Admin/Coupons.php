<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\shop\Coupon;
use Illuminate\Support\Facades\DB;

class Coupons extends Component
{

    public $user_id;
    public $error_message;
    public $coupon_active;

    //atasarea couponul unui utilizator
    public function atachUser()
    {
        $this->validate([
            'user_id' => 'required|numeric'
        ]);

        $user = User::find($this->user_id);
        if (!$user) {
            $this->error_message = "Acest utilizator nu exista in baza de date";
            $this->user_id = null;

            return;
        }


        $this->coupon_active->users()->attach($this->user_id);
        $this->user_id = null;
    }

    public function detachUser($id)
    {

        $this->coupon_active->users()->detach($id);
        $this->user_id = null;
    }


    public function openModalCoupons($id)
    {

        $this->coupon_active = Coupon::findOrFail($id);
        $this->dispatchBrowserEvent('openCouponsModal');
    }

    public function resetUserModal()
    {
        $this->user_id = null;
        $this->error_message = null;
        $this->coupon_active = null;
    }

    public function render()
    {
        $coupons = Coupon::orderByDesc('expired_at')->paginate()->withQuerystring();
        return view('livewire.admin.coupons')
            ->with('coupons', $coupons);
    }
}
