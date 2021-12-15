<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = "fact_order";
    protected $fillable = [
        "user_id",
        "wh_no",
        "order_no",
        "send_name",
        "send_tel",
        "send_detail",
        "send_district",
        "send_city",
        "send_province",
        "send_postal_code",
        "recv_name",
        "recv_tel",
        "recv_detail",
        "recv_district",
        "recv_city",
        "recv_province",
        "recv_postal_code",
        "category",
        "weight",
        "width_size",
        "length_size",
        "height_size",
        "cod",
        "estimate_price",
        "note_detail",
        "is_return_insurance",
        "is_protect_insurance",
        "is_express_transport",
        "is_damage_insurance",
        "tracking_no",
        "original_tracking",
        "return_tracking",
        "status",
        "cancel_reason",
    ];
}
