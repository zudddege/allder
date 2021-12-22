<?php

namespace App\Http\Controllers\AddressBookController;

use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use Illuminate\Http\Request;

class AddressBookController extends Controller {
    public function getAddressBookById(Request $request) {
        return AddressBook::select('book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code', 'is_main_book')->find($request->id);
    }

    public function showAddressBook() {
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();

        return view('address-book.address-book', compact('addressBooks'));
    }

    public function addAddressBook() {
    }

    public function createAddressBook(Request $request) {
        AddressBook::create([
            'book_no' => $request->book_no,
            'book_name' => $request->book_name,
            'book_tel' => $request->book_tel,
            'book_detail' => $request->book_detail,
            'book_district' => $request->book_district,
            'book_city' => $request->book_city,
            'book_province' => $request->book_province,
            'book_postal_code' => $request->book_postal_code,
            'is_main_book' => $request->is_main_book,
        ]);

        $mainBook = AddressBook::select('id')->where('is_main_book', 1)->first();
        if ($mainBook) {
            AddressBook::find($mainBook->id)->update(['is_main_book' => false]);
        }
    }
}
