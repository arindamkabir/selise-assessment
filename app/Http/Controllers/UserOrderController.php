<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function userOrders(Request $request)
    {
        $orders = Order::query()
            ->where('user_id', $request->user()->id)
            ->paginate(10);

        return view('profile.orders.index', ['orders' => $orders]);
    }

    public function showUserOrder(Request $request, $id)
    {
        $order = Order::query()
            ->with(['order_items', 'order_items.product'])
            ->where('user_id', $request->user()->id)
            ->findOrFail($id);

        return view('profile.orders.show', ['order' => $order]);
    }
}
