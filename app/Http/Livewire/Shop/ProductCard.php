<?php

namespace App\Http\Livewire\Shop;

use App\Services\CartService;
use Livewire\Component;

class ProductCard extends Component
{
    public $product;

    /**
     * Add product to cart
     */
    public function addToCart(CartService $cartService)
    {
        try {
            $cartService->add($this->product);
            $this->emit('updateCart', true);
        } catch (\Exception $e) {
            $this->notify('There was an error. Please try again.', 'warning');
        }
    }

    public function render()
    {
        return view('shop.product-card');
    }
}
