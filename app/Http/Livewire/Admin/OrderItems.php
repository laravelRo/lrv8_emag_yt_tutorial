<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\shop\Order;
use App\Events\NewOrderEvent;
use App\Models\shop\OrderItem;
use App\Models\content\Product;



class OrderItems extends Component
{
    public $order;

    public $id_new;


    protected $listeners = ['deleteOrderItem', 'qtyChanged'];

    public function qtyChanged()
    {
        $this->order = Order::findOrFail($this->order->id);
    }


    public function approveOrder()
    {

        $this->order->approved_at = now();
        $this->order->save();

        $message = "Comanda cu nr " . $this->order->id . " a fost verificata si aprobata. <br> Imediat ce se va inregistra plata va fi expediata.";

        NewOrderEvent::dispatch($this->order, $message);
    }

    public function uncheckOrder()
    {
        $this->order->approved_at = null;
        $this->order->save();

        $this->unreciviedOrder();
        $this->unpayedOrder();
    }

    public function unpayedOrder()
    {
        $this->order->payed_at = null;
        $this->order->save();

        $this->unreciviedOrder();
    }

    public function payedOrder()
    {
        $this->order->payed_at = now();
        $this->order->save();

        $message = "A fost inregistrata plata pentru comanda cu nr " . $this->order->id . ". Comanda va ajunge la Dvs in maximum 3 zile lucratoare .";

        NewOrderEvent::dispatch($this->order, $message);
    }

    public function unreciviedOrder()
    {
        $this->order->recivied_at = null;
        $this->order->save();
    }
    public function reciviedOrder()
    {
        $this->order->recivied_at = now();
        $this->order->save();

        $user = User::findOrFail($this->order->user_id);
        $user->points += (int) $this->order->totalCost() / 10;
        $user->save();
    }

    //adaugarea unui nou produs in comanda
    public function addProduct()
    {
        if ($this->id_new) {

            if (!is_numeric($this->id_new)) {
                return;
            }
            $product = Product::findOrFail($this->id_new);

            $new_item = $this->order->order_items()->where('product_id', $this->id_new)->first();

            //verificam daca avem deja produsul in lista
            if ($new_item) {
                $new_item->qty++;
                $new_item->save();
            }

            //daca nu avem produsul in lista
            else {
                $new_item = new OrderItem;

                $new_item->order_id = $this->order->id;
                $new_item->product_id = $product->id;
                $new_item->product_name = $product->name;
                $new_item->price = $product->price;
                $new_item->qty = 1;

                $new_item->save();
            }

            $this->id_new = null;
            $this->order = Order::findOrFail($this->order->id);

            // return  redirect(route('admin.orders.edit', $this->order->id));
        }
    }

    //stergerea unui produs din comanda
    public function deleteOrderItem($id)
    {
        $this->order->order_items()->where('id', $id)->first()->delete();
        $this->order = Order::findOrFail($this->order->id);
    }


    public function render()
    {
        return view('livewire.admin.order-items');
    }
}
