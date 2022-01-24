<?php

namespace App;

use App\Models\AddressBook\AddressBook;
use App\Models\Courier\Courier;
use App\Models\Order\Order;
use App\Models\Warehouse\Warehouse;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $with = [
        'books',
        'warehouses',
        'couriers',
        'orders',
    ];

    protected $table = 'users';
    protected $fillable = [
        'is_admin',
        'is_status',
        'close_id',
        'short_id',
        'email',
        'username',
        'account_name',
        'tel_no',
        'discount_rate',
        'cod_rate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books() {
        return $this->hasMany(AddressBook::class);
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class);
    }

    public function couriers() {
        return $this->hasMany(Courier::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
