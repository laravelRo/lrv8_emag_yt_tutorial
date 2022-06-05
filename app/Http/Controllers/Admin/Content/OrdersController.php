<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\shop\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function listOrders()
    {
        $orders = Order::orderByDesc('created_at')->paginate(15)->withQueryString();

        return view('admin.content.orders.list')
            ->with('orders', $orders);
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.content.orders.edit')
            ->with('order', $order);
    }
}
