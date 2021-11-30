<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Order\Order;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'created_at'     => $row[0],
            'status'         => $row[1], 
            'order_no'       => $row[2],
            'order_no'       => $row[3], 
            'order_no'       => $row[4],
            'send_address'   => $row[5], 
            'send_tel'       => $row[6],
            'recv_address'   => $row[7], 
            'recv_tel'       => $row[8],
            'categories'     => $row[9],
            'weight'         => $row[10],
            'width_size'     => $row[11],
            'length_size'    => $row[12], 
            'height_size'    => $row[13],
            'cod'            => $row[14],
            'cod'            => $row[15], 
            'note_detail'    => $row[16], 
            //
        ]);
    }
}