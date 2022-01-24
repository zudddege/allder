<?php

namespace App\Models\Warehouse;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {
    protected $table = 'warehouses';
    protected $fillable = [
        'user_id',
        'warehouse_no',
        'warehouse_name',
        'contact_name',
        'warehouse_tel',
        'warehouse_detail',
        'warehouse_district',
        'warehouse_city',
        'warehouse_province',
        'warehouse_postal_code',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
