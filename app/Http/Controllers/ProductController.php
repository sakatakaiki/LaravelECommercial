<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Lấy danh sách sản phẩm có tên chứa từ khóa tìm kiếm
        $products = Product::where('name', 'LIKE', "%{$query}%")->paginate(12);

        $topProducts = Product::getTopViewedProducts();
        return view('search', compact('products', 'query', 'topProducts'));
    }

}
