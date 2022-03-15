<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Show all products
     */
    public function index()
    {
        $products = Product::query()
            ->paginate(12);

        return view('shop.index', [
            'products' => $products
        ]);
    }
}
