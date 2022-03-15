<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Navigation extends Component
{
    public $cartCount;
    public $cartContent;
    public $searchQuery = '';

    protected $listeners = ['updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

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
     * Update the cart and open menu.
     */
    public function updateCart(bool $openMenu = false)
    {
        $this->cartCount = Cart::count();

        $this->cartContent = Cart::content();

        if ($openMenu)
            $this->dispatchBrowserEvent('open-cart');
    }


    public function render()
    {
        return view('navigation');
    }
}
