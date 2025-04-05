<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;


class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Xem chi tiết đơn hàng và danh sách order items
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Order $order)
    {
        $order->status = $order->status === 'pending' ? 'finished' : 'pending';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }

    // Xuất đơn hàng thành file Excel
    public function exportOrder(Order $order)
    {
        // Tạo một instance của Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Đặt tiêu đề
        $sheet->setCellValue('A1', 'Order Code');
        $sheet->setCellValue('B1', $order->code);

        // Đặt tiêu đề bảng
        $sheet->setCellValue('A3', 'Product');
        $sheet->setCellValue('B3', 'Price');
        $sheet->setCellValue('C3', 'Quantity');
        $sheet->setCellValue('D3', 'Total');

        // Áp dụng định dạng cho tiêu đề bảng
        $sheet->getStyle('A3:D3')->getFont()->setBold(true);
        $sheet->getStyle('A3:D3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:D3')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Đưa dữ liệu vào bảng
        $row = 4;
        foreach ($order->orderItems as $item) {
            $sheet->setCellValue('A' . $row, $item->product->name);
            $sheet->setCellValue('B' . $row, $item->price);
            $sheet->setCellValue('C' . $row, $item->quantity);
            $sheet->setCellValue('D' . $row, $item->price * $item->quantity);
            $row++;
        }

        // Tính tổng giá trị
        $sheet->setCellValue('C' . $row, 'Total');
        $sheet->setCellValue('D' . $row, '=SUM(D4:D' . ($row - 1) . ')');

        // Áp dụng định dạng cho dòng tổng giá trị
        $sheet->getStyle('C' . $row . ':D' . $row)->getFont()->setBold(true);
        $sheet->getStyle('C' . $row . ':D' . $row)->getBorders()->getTop()->setBorderStyle(Border::BORDER_THIN);

        // Đặt chiều rộng cột tự động
        foreach (range('A', 'D') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Định dạng toàn bộ bảng
        $sheet->getStyle('A3:D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:D' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Lưu file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'order_' . $order->code . '.xlsx';
        return response()->stream(
            function () use ($writer) {
                $writer->save('php://output'); // Xuất file ra output stream
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="' . $fileName . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );
    }

    
}
