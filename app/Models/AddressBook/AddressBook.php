<?php

namespace App\Models\AddressBook;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model {
    protected $table = 'address_books';
    protected $fillable = [
        'user_id',
        'is_main',
        'book_no',
        'book_name',
        'book_tel',
        'book_detail',
        'book_district',
        'book_city',
        'book_province',
        'book_postal_code',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
