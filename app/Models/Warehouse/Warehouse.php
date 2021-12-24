<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {
    protected $table = "dim_warehouse";
    protected $fillable = [
        "user_id",
        "warehouse_no",
        "warehouse_name",
        "contact_name",
        "warehouse_tel",
        "warehouse_detail",
        "warehouse_district",
        "warehouse_city",
        "warehouse_province",
        "warehouse_postal_code",
    ];
}
