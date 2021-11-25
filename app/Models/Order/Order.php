<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "fact_order";
    protected $fillable = [
        "user_id",
        "order_no",
        "send_name",
        "send_tel",
        "send_area",
        "send_address",
        "recv_name",
        "recv_tel",
        "recv_area",
        "recv_address",
        "categories",
        "weight",
        "width_size",
        "length_size",
        "height_size",
        "cod",
        "note_detail",
        "is_return_insurance",
        "is_protect_insurance",
        "is_express_transport",
        "is_damage_insurance".
        "tracking_no",
        "original_tracking",
        "return_tracking",
        "status",
        "cancel_reason",
        "create_time",
        "complete_time"
    ];
}
