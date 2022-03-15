<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class AddToCartButton extends Component
{
    public Product $product;

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
        return view('product.add-to-cart-button');
    }
}
