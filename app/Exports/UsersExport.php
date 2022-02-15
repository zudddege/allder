<?php

namespace App\Exports;

use App\Models\Order\Order;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings {
    /**
     * @return \Illuminate\Support\Collection
     *
     */

    public function collection() {
        return Order::all();
    }

    public function map($order): array{
        return [
            $order->created_at->addYear(543)->format('d/m/Y - h:i a'),
            $order->status_text,
            $order->order_no,
            $order->tracking_no,
            "Allder Express",
            $order->send_name,
            $order->send_tel,
            $order->recv_name,
            $order->recv_tel,
            $order->category_text,
            $order->weight,
            $order->width,
            $order->length,
            $order->height,
            $order->order_price,
            $order->user_price,
            $order->note_detail,
        ];
    }

    public function headings(): array
    {
        return [
            "เวลาที่ทำรายการ",
            "สถานะจัดส่ง",
            "เลขออเดอร์",
            "เลขพัสดุ",
            "แหล่งที่มา",
            "ผู้ส่ง",
            "เบอร์โทรศัพท์ผู้ส่ง",
            "ผู้รับ",
            "เบอร์โทรศัพท์ผู้รับ",
            "ประเภทสินค้า",
            "น้ำหนัก (kg)",
            "ความกว้าง (cm)",
            "ความยาว (cm)",
            "ความสูง (cm)",
            "ยอดเก็บเงินปลายทาง",
            "ราคาโดยประมาณ",
            "หมายเหตุ",
        ];
    }
}
