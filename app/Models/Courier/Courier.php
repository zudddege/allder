<?php

namespace App\Models\Courier;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model {
    protected $table = 'couriers';
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
        'parcel_quantity',
        'status_code',
        'status_text',
        'note_detail',
        'operator_id',
        'operator_name',
        'operator_tel',
        'operation_branch',
        'timeout_text',
        'ticket_message',
        'cancel_operator',
        'cancel_reason',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
