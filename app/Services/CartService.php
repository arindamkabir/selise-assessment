<?php

namespace App\Services;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService
{
    /**
     * Add product to cart
     */
    public function add(Product $product)
    {
        $item = Cart::content()->where('id', $product->id)->first();

        if ($item) {
            $qty = $item->qty + 1;
            Cart::update($item->rowId, $qty);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 2,
            ])->associate('App\Models\Product');
        }
    }

    /**
     * Remove a product from cart
     */
    public function remove($rowId)
    {
        Cart::remove($rowId);
    }

    /**
     * Increase the quantity of
     * a product in cart
     */
    public function increaseQuantity($rowId)
    {
        if (!Cart::content()->contains('rowId', $rowId)) return false;

        $cartItem = Cart::get($rowId);

        $qty = $cartItem->qty + 1;
        Cart::update($rowId, $qty);
    }

    /**
     * Decrease the quantity of
     * a product in cart
     */
    public function decreaseQuantity($rowId)
    {
        if (!Cart::content()->contains('rowId', $rowId)) return false;

        $cartItem = Cart::get($rowId);

        $qty = $cartItem->qty - 1;
        Cart::update($rowId, $qty);
    }
}
