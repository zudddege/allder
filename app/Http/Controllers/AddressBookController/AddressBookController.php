<?php

namespace App\Http\Controllers\AddressBookController;

use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;

class AddressBookController extends Controller {
    public function getAddressBookById(Request $request) {
        return AddressBook::select('book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code', 'is_main_book')->find($request->id);
    }

    public function showBook() {
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();
        $wareHouses = Warehouse::select('id', 'warehouse_no', 'warehouse_name', 'contact_name', 'warehouse_tel', 'warehouse_detail', 'warehouse_district', 'warehouse_city', 'warehouse_province', 'warehouse_postal_code')->get();

        return view('address-book.view-address-book', compact('addressBooks', 'wareHouses'));
    }

    public function addAddressBook() {
        return view('address-book.add-address-book');
    }

    public function addWarehouse() {
        return view('address-book.add-warehouse');
    }

    public function detailAddressBook($id) {
        $addressBook = AddressBook::find($id);

        return view('address-book.detail-address-book', compact('addressBook'));
    }

    public function detailWarehouse($id) {
        $wareHouse = Warehouse::find($id);

        return view('address-book.detail-warehouse', compact('wareHouse'));
    }

    public function editAddressBook($id) {
        $addressBook = AddressBook::find($id);

        return view('address-book.edit-address-book', compact('addressBook'));
    }

    public function editWarehouse($id) {
        $wareHouse = Warehouse::find($id);

        return view('address-book.edit-warehouse', compact('wareHouse'));
    }

    public function createAddressBook(Request $request) {
        if ($request->is_main_book) {
            AddressBook::where('is_main_book', 1)->update(['is_main_book' => false]);
        }

        AddressBook::create([
            'book_no' => $request->book_no,
            'book_name' => $request->book_name,
            'book_tel' => $request->book_tel,
            'book_detail' => $request->book_detail,
            'book_district' => $request->book_district,
            'book_city' => $request->book_city,
            'book_province' => $request->book_province,
            'book_postal_code' => $request->book_postal_code,
            'is_main_book' => $request->is_main_book ? 1 : 0,
        ]);

        return redirect('/book');
    }

    public function createWarehouse(Request $request) {
        Warehouse::create([
            'warehouse_no' => $request->warehouse_no,
            'warehouse_name' => $request->warehouse_name,
            'contact_name' => $request->contact_name,
            'warehouse_tel' => $request->warehouse_tel,
            'warehouse_detail' => $request->warehouse_detail,
            'warehouse_district' => $request->warehouse_district,
            'warehouse_city' => $request->warehouse_city,
            'warehouse_province' => $request->warehouse_province,
            'warehouse_postal_code' => $request->warehouse_postal_code,
        ]);

        return redirect('/book');
    }

    public function modifyAddressBook(Request $request, $id) {
        if ($request->is_main_book) {
            AddressBook::where('is_main_book', 1)->update(['is_main_book' => false]);
        }

        AddressBook::find($id)->update([
            'book_no' => $request->book_no,
            'book_name' => $request->book_name,
            'book_tel' => $request->book_tel,
            'book_detail' => $request->book_detail,
            'book_district' => $request->book_district,
            'book_city' => $request->book_city,
            'book_province' => $request->book_province,
            'book_postal_code' => $request->book_postal_code,
            'is_main_book' => $request->is_main_book ? 1 : 0,
        ]);

        return redirect('/book');
    }

    public function modifyWareHouse(Request $request, $id) {
        Warehouse::find($id)->update([
            'warehouse_no' => $request->warehouse_no,
            'warehouse_name' => $request->warehouse_name,
            'contact_name' => $request->contact_name,
            'warehouse_tel' => $request->warehouse_tel,
            'warehouse_detail' => $request->warehouse_detail,
            'warehouse_district' => $request->warehouse_district,
            'warehouse_city' => $request->warehouse_city,
            'warehouse_province' => $request->warehouse_province,
            'warehouse_postal_code' => $request->warehouse_postal_code,
        ]);

        return redirect('/book');
    }
}
