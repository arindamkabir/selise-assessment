<?php

namespace App\Services;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    /**
     * Place order from checkout
     */
    public function createOrder($attributes): Order
    {
        try {
            DB::beginTransaction();

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->subtotal = session()->get('checkout')['subtotal'];
            $order->total = session()->get('checkout')['total'];
            $order->f_name = $attributes['f_name'];
            $order->l_name = $attributes['l_name'];
            $order->phone = $attributes['phone'];
            $order->line1 = $attributes['line1'];
            $order->line2 = $attributes['line2'];
            $order->city = $attributes['city'];
            $order->zip_code = $attributes['zip_code'];
            $order->status = 'placed';

            $order->save();

            //Order_Items Creation
            foreach (Cart::content() as $item) {
                $order->order_items()->create([
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->qty
                ]);
                $order->refresh();
            }

            DB::commit();

            Cart::destroy();
            session()->forget('checkout');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $order;
    }
}
