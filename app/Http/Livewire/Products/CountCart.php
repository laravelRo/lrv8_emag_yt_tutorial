<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\shop\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CountCart extends Component
{
    public $count = 0;

    protected $listeners = ['countProducts' => '$refresh'];

    public function render()
    {
        //utilizatorul este logat
        if (Auth::check()) {
            $this->count = Cart::where('user_id', Auth::id())->count();
        }
        // utilizatorul nu este logat
        else {
            $this->count = Cart::where('session_id', Session::getId())->count();
        }

        return view('livewire.products.count-cart');
    }
}
