<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Kiểm tra user đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to add items to cart.');
        }

        $user = Auth::user();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Mặc định số lượng là 1
        $product = Product::find($product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Kiểm tra xem user có đơn hàng đang pending không
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if (!$order) {
            // Nếu không có, tạo đơn hàng mới
            $order = Order::create([
                'code' => 'ORDER-' . strtoupper(uniqid()), // Mã đơn hàng ngẫu nhiên
                'status' => 'pending',
                'user_id' => $user->id,
                'created_at' => now()
            ]);
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $orderItem = OrderItem::where('order_id', $order->id)
            ->where('product_id', $product_id)
            ->first();

        if ($orderItem) {
            // Nếu đã có, tăng số lượng
            $orderItem->quantity += $quantity;
            $orderItem->save();
        } else {
            // Nếu chưa có, thêm mới
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function viewCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to view the cart.');
        }

        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->first();
        $cart = $order ? $order->orderItems : [];

        $subtotal = collect($cart)->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return view('cart', compact('cart', 'subtotal'));
    }


    public function removeFromCart($id)
    {
        $orderItem = OrderItem::find($id);
        if (!$orderItem) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        $orderItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }



    public function updateCart(Request $request)
    {
        $orderItem = OrderItem::find($request->input('order_item_id'));
        if (!$orderItem) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        $orderItem->quantity = $request->input('quantity');
        $orderItem->save();
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to proceed with checkout.');
        }

        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->first();

        if (!$order || $order->orderItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Cập nhật trạng thái đơn hàng
        $order->status = 'finished';
        $order->save();

        return redirect()->route('cart.view')->with('success', 'Checkout successful. Thank you for your purchase!');
    }

    public function getMiniCart()
    {
        if (!Auth::check()) {
            return response()->json(['cart' => []]);
        }

        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->first();
        $cart = $order ? $order->orderItems->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->quantity * $item->price,
                'thumbnail' => $item->product->thumbnail,
            ];
        }) : [];

        return response()->json(['cart' => $cart]);
    }

    public function removeFromMiniCart($id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
    
        $orderItem = OrderItem::find($id);
        if (!$orderItem) {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    
        $removedQuantity = $orderItem->quantity;
        $removedTotal = $orderItem->quantity * $orderItem->price;
    
        $orderItem->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Item removed',
            'removedQuantity' => $removedQuantity,
            'removedTotal' => $removedTotal
        ]);
    }



}