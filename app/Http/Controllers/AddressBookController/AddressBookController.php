<?php

namespace App\Http\Controllers\AddressBookController;

use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use Illuminate\Http\Request;

class AddressBookController extends Controller {
    public function getAddressBookById(Request $request) {
        return AddressBook::select('book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code', 'is_main_book', )->find($request->id);
    }
}
