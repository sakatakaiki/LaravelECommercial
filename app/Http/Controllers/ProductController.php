<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function home()
    {
        $topProducts = Product::getTopViewedProducts();
        $latestProducts = Product::getLatestProducts(8);
        return view('home', compact('topProducts', 'latestProducts'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(6)
            ->get();
        return view('products', compact('product', 'relatedProducts'));
    }
}
