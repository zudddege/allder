<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = "dim_warehouse";
    protected $fillable = [
        "user_id",
        "wh_no",
        "wh_name",
        "contact_name",
        "wh_tel",
        "wh_area",
        "wh_address"
    ];
}
