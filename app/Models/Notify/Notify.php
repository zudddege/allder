<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model {
    protected $table = "dim_notify";
    protected $fillable = [
        'user_id',
        'pickup_id',
        'warehouse_no',
        'warehouse_name',
        'contact_name',
        'warehouse_tel',
        'warehouse_detail',
        'warehouse_district',
        'warehouse_city',
        'warehouse_province',
        'warehouse_postal_code',
        'estimate_parcel_quantity',
        'parcel_quantity',
        'status',
        'note_detail',
        'staff_id',
        'staff_name',
        'staff_tel',
        'timeout_text',
        'ticket_message',
        'notice',
    ];
}
