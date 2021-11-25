<?php

namespace App\Models\AddressBook;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $table = "dim_address_book";
    protected $fillable = [
        "user_id",
        "book_no",
        "book_name",
        "book_tel",
        "book_area",
        "book_address",
        "is_main_book"
    ];
}
