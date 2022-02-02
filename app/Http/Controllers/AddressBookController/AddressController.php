<?php

namespace App\Http\Controllers\AddressBookController;

use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class AddressController extends Controller {
    public function showAddressBook() {
        $addresses = AddressBook::when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Auth::user()->is_admin == 0, function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();

        $warehouses = Warehouse::when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Auth::user()->is_admin == 0, function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();

        return view('address-book.view-address-book', compact('addresses', 'warehouses'));
    }

    public function addAddress() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('address-book.add-address-book', compact('warehouses'));
    }

    public function createAddress(Request $request) {
        if ($request->is_main) {
            (new AddressController)->updateMainAddress(Auth::id());
        }

        AddressBook::create([
            'user_id' => Auth::id(),
            'book_no' => $request->book_no,
            'book_name' => $request->book_name,
            'book_tel' => $request->book_tel,
            'book_detail' => $request->book_detail,
            'book_district' => $request->book_district,
            'book_city' => $request->book_city,
            'book_province' => $request->book_province,
            'book_postal_code' => $request->book_postal_code,
            'is_main' => $request->is_main ? 1 : 0,
        ]);

        return redirect('/books');
    }

    public function detailAddress(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $address = AddressBook::where('id', $request->query('id'))->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(AddressBook::find($request->query('id'))->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();

        return view('address-book.detail-address-book', compact('address','warehouses'));
    }

    public function editAddress(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $address = AddressBook::where('id', $request->query('id'))->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(AddressBook::find($request->query('id'))->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();
        return view('address-book.edit-address-book', compact('address','warehouses'));
    }

    public function updateAddress(Request $request, $id) {
        $address = AddressBook::where('id', $id)->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(AddressBook::find($id)->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();

        if ($request->is_main) {
            (new AddressController)->updateMainAddress($address->user_id);
        }

        AddressBook::where('id', $id)->update([
            'book_no' => $request->book_no,
            'book_name' => $request->book_name,
            'book_tel' => $request->book_tel,
            'book_detail' => $request->book_detail,
            'book_district' => $request->book_district,
            'book_city' => $request->book_city,
            'book_province' => $request->book_province,
            'book_postal_code' => $request->book_postal_code,
            'is_main' => $request->is_main ? 1 : 0,
        ]);

        return redirect('/books/address/detail?id=' . $id);
    }

    public function updateMainAddress($userId) {
        AddressBook::where([
            'is_main' => 1,
            'user_id' => $userId,
        ])->update(['is_main' => false]);
    }

    public function getAddress() {
        $address = AddressBook::where('user_id', Auth::id())->get();
        return $address;
    }

    public function getAddressById($id) {
        $address = AddressBook::where(['user_id' => Auth::id(), 'id' => $id])->get();
        return $address;
    }
}
