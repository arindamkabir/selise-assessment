<?php

namespace App\Http\Livewire\Cart;

use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public $terms_checkbox;

    /**
     * Increase quantity of item in cart
     */
    public function increaseQty(CartService $cartService, $rowId)
    {
        try {
            $cartService->increaseQuantity($rowId);
            $this->emit('updateCart');
        } catch (\Exception $e) {
            $this->notify('There was an error. Please try again.', 'warning');
        }
    }

    /**
     * Decrease quantity of item in cart
     */
    public function decreaseQty(CartService $cartService, $rowId)
    {
        try {
            $cartService->decreaseQuantity($rowId);
            $this->emit('updateCart');
        } catch (\Exception $e) {
            $this->notify('There was an error. Please try again.', 'warning');
        }
    }

    /**
     * Remove item from cart
     */
    public function removeItem(CartService $cartService, $rowId)
    {
        try {
            $cartService->remove($rowId);
            $this->emit('updateCart');
        } catch (\Exception $e) {
            $this->notify('There was an error. Please try again.', 'warning');
        }
    }

    /**
     * Store amount variables in session for checkout
     */
    public function setCheckoutAmounts()
    {
        session()->put('checkout', [
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total' => Cart::total()
        ]);
    }

    /**
     * Check if everything is in order for checkout
     */
    public function goToCheckout()
    {
        if (!Cart::count() > 0) return;

        $this->validate([
            'terms_checkbox' => 'accepted'
        ], [
            'terms_checkbox.accepted' => 'You must accept our terms and policies to continue to checkout.'
        ]);

        $this->setCheckoutAmounts();

        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('cart.cart-table');
    }
}
