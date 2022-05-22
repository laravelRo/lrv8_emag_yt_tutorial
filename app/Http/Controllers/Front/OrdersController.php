<?php

namespace App\Http\Controllers\Front;


use Barryvdh\DomPDF\Facade\PDF;
use App\Models\shop\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //listam comenzile pentru un utiizator
    public function listOrders()
    {
        $orders = Order::with(['order_items'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('front.user.cpanel.orders')->with('orders', $orders);
    }

    //afisam comanda sub forma de pdf
    public function showPdf($id)
    {
        $order = Order::findOrFail($id);

        $pdf_order = PDF::loadView('front.user.cpanel.pdf-order', ['order' => $order]);
        return $pdf_order->stream('order.pdf');
    }
}
