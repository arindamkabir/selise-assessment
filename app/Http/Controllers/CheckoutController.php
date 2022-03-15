<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Show checkout page
     */
    public function index()
    {
        if (!session()->has('checkout'))
            return redirect()->route('home');

        return view('checkout.index');
    }

    /**
     * Store order in the database
     */
    public function placeOrder(StoreOrderRequest $request, CheckoutService $checkoutService)
    {
        $validated = $request->validated();

        try {
            $order = $checkoutService->createOrder($validated);
            return redirect()->route('checkout.success', ['id' => $order->id]);
        } catch (\Exception $e) {
            session()->flash('flash.banner', 'There was an error. Please try again.');
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('home');
        }
    }

    /**
     * Success Page
     */
    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('checkout.success', ['order' => $order]);
    }
}
