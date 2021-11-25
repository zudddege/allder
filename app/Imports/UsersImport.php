<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new user([
            'created_at'     => $row[0],
            'status'         => $row[1], 
            'order_no'       => $row[2],
            'order_no'       => $row[3], 
            'order_no'       => $row[4],
            'send_address'   => $row[5], 
            'send_tel'       => $row[6],
            'recv_address'   => $row[7], 
            'recv_tel'       => $row[8],
            'categories','weight','width_size','length_size','height_size'    => $row[9], 
            'cod'            => $row[10],
            'cod'            => $row[11], 
            'note_detail'    => $row[12], 
            //
        ]);
    }
}
