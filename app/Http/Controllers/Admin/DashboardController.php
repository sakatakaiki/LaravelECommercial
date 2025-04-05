<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use \Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        // Lấy số lượng đơn hàng theo trạng thái
        $orderStats = [
            [
                'title' => 'Total Orders',
                'count' => Order::count(),
            ],
            [
                'title' => 'Pending Orders',
                'count' => Order::where('status', 'pending')->count(),
            ],
            [
                'title' => 'Finished Orders',
                'count' => Order::where('status', 'finished')->count(),
            ],
            [
                'title' => 'Revenue This Month',
                'count' => '$' . $this->calculateRevenueThisMonth(),
            ],
        ];

        // Lấy danh sách đơn hàng gần đây
        $orderList = Order::orderBy('created_at', 'desc')->take(5)->get();

        // Lấy số lượng đơn hàng theo tháng
        $ordersByMonth = Order::selectRaw('DATE_FORMAT(created_at, "%m/%Y") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderByRaw('MIN(created_at) ASC')
            ->get();

        // Lấy số lượng đơn hàng theo ngày
        $ordersByDay = Order::selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y") as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderByRaw('MIN(created_at) ASC')
            ->get();

        return view('admin.dashboard', compact('orderStats', 'orderList', 'ordersByMonth', 'ordersByDay'));
    }

    private function calculateRevenueThisMonth()
    {
        // Tính tổng doanh thu trong tháng hiện tại cho các đơn hàng có trạng thái 'finished'
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Lấy các đơn hàng 'finished' trong tháng này
        $orders = Order::where('status', 'finished')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();

        $totalRevenue = 0;

        // Duyệt qua các đơn hàng và tính tổng doanh thu
        foreach ($orders as $order) {
            foreach ($order->orderItems as $orderItem) {
                $totalRevenue += $orderItem->quantity * $orderItem->price;
            }
        }

        return number_format($totalRevenue, 2); // Định dạng kết quả thành số có 2 chữ số thập phân
    }
}
