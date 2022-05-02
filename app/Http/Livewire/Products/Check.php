<?php

namespace App\Http\Livewire\Products;

use App\Models\Address;
use Livewire\Component;
use App\Models\shop\Cart;
use App\Models\shop\Order;
use App\Models\shop\OrderItem;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Check extends Component
{
    public $select_id;

    public $name, $phone, $city, $address, $observations;


    public function selectAddress($id)
    {
        $this->select_id = $id;

        $address = Address::findOrFail($id);
        $this->name = $address->name;
        $this->phone = $address->phone;
        $this->city = $address->city;
        $this->address = $address->address;
        $this->observations = $address->observations;
    }


    public function placeCommand()
    {
        //creem o noua comanda
        $order = new Order;

        //setam cheia straina pentru utilizator
        $order->user_id = Auth::id();

        $order->name = $this->name;
        $order->city = $this->city;
        $order->address = $this->address;
        $order->phone = $this->phone;
        $order->observation = $this->observations;

        $order->save();

        foreach (Cart::cartProducts() as $product) {
            $item = new OrderItem;

            $item->order_id = $order->id;

            $item->product_id = $product->product_id;
            $item->qty = $product->qty;
            $item->product_name = $product->product->name;
            $item->price = $product->product->price;

            $item->save();
        }
        Cart::emtyCart();
        Alert::success('Comanda a fost plasata', 'Comanda Dvs a fost inregistrata in baza de date. Veti primi in scurt timp un mesaj cu informatii suplimentare')->persistent(true, false);

        return redirect()->route('home')->with('success', 'Comanda Dvs a fost inregistrata in baza de date. Veti primi in scurt timp un mesaj cu informatii suplimentare');
    }


    public function render()
    {

        $addresses = Auth::user()->addresses;
        return view('livewire.products.check')
            ->with('addresses', $addresses);
    }
}
