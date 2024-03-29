<?php

namespace App\Http\Livewire\Products;

use App\Models\Address;
use Livewire\Component;
use App\Models\shop\Cart;
use App\Models\shop\Order;
use App\Models\shop\Coupon;
use App\Events\NewOrderEvent;
use App\Models\shop\OrderItem;
use App\Models\shop\OrderDiscount;
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

    //plasarea unei comenzi
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

        $order->shipping_cost = 50;


        $order->save();

        //transferam produsele din cos in comanda - order_items
        foreach (Cart::cartProducts() as $product) {
            $item = new OrderItem;

            $item->order_id = $order->id;

            $item->product_id = $product->product_id;
            $item->qty = $product->qty;
            $item->product_name = $product->product->name;
            $item->price = $product->product->price;


            $item->save();
        }

        //salvam discount-ul
        if (session()->get('coupon_active')) {
            $coupon = session()->get('coupon_active');


            //query builder
            // $order->discount()->create([
            //     'coupon_code' => $coupon['code'],
            //     'coupon_description' => $coupon['description'],
            //     'discount' => Cart::cartDiscount()
            // ]);

            //eloquent
            $discount = new OrderDiscount;

            $discount->order_id = $order->id;
            $discount->coupon_code = $coupon['code'];
            $discount->coupon_description = $coupon['description'];
            $discount->discount = Cart::cartDiscount();

            $discount->save();


            //detasam couponul de utilizator daca este de tip utilizator
            if ($coupon['coupon_type'] == 3) {
                $coupon_db = Coupon::where('code', $coupon['code'])->first();
                $coupon_db->users()->detach(auth()->id());
            }

            session()->forget('coupon_active');
        }

        //golim cosul cu produse
        Cart::emtyCart();



        //trimitem un email de confirmare utilizatorului
        $alert = "Comanda a fost inregistrata in baza de date. <br> Imediat ce va fi aprobata veti primi un email de confirmare.";
        NewOrderEvent::dispatch($order, $alert);

        //actualizam stocurile pentru produse

        //trimitem o notificare pentru staff


        Alert::success('Comanda a fost plasata', 'Comanda Dvs a fost inregistrata in baza de date.
        Veti primi in scurt timp un mesaj cu informatii suplimentare')->persistent(true, false);

        return redirect()->route('home');
    }


    public function render()
    {

        $addresses = Auth::user()->addresses;
        return view('livewire.products.check')
            ->with('addresses', $addresses);
    }
}
