<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\User;
use App\Models\shop\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function listOrders()
    {

        //aflam pagina curenta
        Session::put('currentPage', request('page'));

        $user = null;

        if (request('user_id')) {
            $user = User::findOrFail(request('user_id'));

            $orders = Order::where('user_id', request('user_id'))
                ->orderByDesc('created_at')
                ->paginate(15)->withQueryString();
        } else {

            $orders = Order::orderByDesc('created_at')->paginate(15)->withQueryString();
        }

        return view('admin.content.orders.list')
            ->with('orders', $orders)
            ->with('user', $user);
    }

    public function editOrder($id)
    {

        $order = Order::findOrFail($id);
        return view('admin.content.orders.edit')
            ->with('order', $order);
    }
}
