<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the product
     */
    public function show($slug)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('product.show', [
            'product' => $product
        ]);
    }
}
