<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validColumns = ['name', 'price', 'created_at'];
        $validOrders = ['asc', 'desc'];

        // Lấy giá trị từ request và kiểm tra hợp lệ
        $sortBy = in_array($request->input('property'), $validColumns) ? $request->input('property') : 'name';
        $order = in_array($request->input('order'), $validOrders) ? $request->input('order') : 'asc';

        // Thêm điều kiện orderBy vào truy vấn
        $products = Product::where('category_id', $id)
            ->orderBy($sortBy, $order)
            ->paginate(12);

        $topProducts = Product::getTopViewedProducts();

        return view('categories', compact('category', 'products', 'topProducts'));
    }


}
