<?php

namespace App\Exports;

use App\Models\Order\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection {

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        return Order::all();
    }
}
