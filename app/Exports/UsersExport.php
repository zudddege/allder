<?php

namespace App\Exports;

use App\Models\Order\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, ShouldAutoSize {
    /**
     * @return \Illuminate\Support\Collection
     * WithMapping, WithHeadings
     */

    public function collection() {
        return Order::all();
    }

    /* public function map($order): array{
    return [
    $order->created_at->addYear(543)->format('d/m/Y - h:i a'),
    $order->status,
    $order->order_no,
    $order->order_no,
    $order->order_no,
    $order->send_name,
    $order->send_tel,
    $order->recv_name,
    $order->recv_tel,
    $order->category,
    $order->weight,
    $order->width_size,
    $order->length_size,
    $order->height_size,
    $order->cod,
    $order->cod,
    $order->note_detail,
    ];
    } */

    /* public function headings(): array
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
"น้ำหนัก",
"ความกว้าง",
"ความยาว",
"ความสูง",
"ยอดเก็บเงินปลายทาง",
"ราคาโดยประมาณ",
"หมายเหตุ",
];
} */
}
