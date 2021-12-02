<?php

namespace App\Exports;

use App\Models\Order\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromView, ShouldAutoSize, WithMapping, WithHeadings {
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View {
        return view('order', ['orders' => Order::all()]);
    }

    public function map($order): array{
        return [$order->id, $order->send_name];
    }

    public function headings(): array
    {
        return ["id", "ชื่อผู้ส่ง"];
    }
}
