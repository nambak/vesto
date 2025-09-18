<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        echo 'product index';
    }

    public function show(Product $product)
    {
        $relatedProducts = $product->getRelatedProducts(4);

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
