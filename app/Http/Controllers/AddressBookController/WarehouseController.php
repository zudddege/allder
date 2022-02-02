<?php

namespace App\Http\Controllers\AddressBookController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller {
    public function addWarehouse() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('address-book.add-warehouse', compact('warehouses'));
    }

    public function createWarehouse(Request $request) {
        Warehouse::create([
            'user_id' => Auth::id(),
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

        return redirect('/books');
    }

    public function detailWarehouse(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $warehouse = Warehouse::where('id', $request->query('id'))->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Warehouse::find($request->query('id'))->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();

        return view('address-book.detail-warehouse', compact('warehouse','warehouses'));
    }

    public function editWarehouse(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $warehouse = Warehouse::where('id', $request->query('id'))->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Warehouse::find($request->query('id'))->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();

        return view('address-book.edit-warehouse', compact('warehouse','warehouses'));
    }

    public function updateWarehouse(Request $request, $id) {
        $warehouse = Warehouse::where('id', $id)->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Warehouse::find($id)->user_id == Auth::id(), function ($query) {
            return $query->where('user_id', Auth::id());
        })->firstOrFail();

        $warehouse->update([
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

        return redirect('/books');
    }

    public function getWarehouse() {
        $warehouses = Warehouse::where('user_id', Auth::id())->get();
        return $warehouses;
    }

    public function getWarehouseById($id) {
        $warehouse = Warehouse::where(['id' => $id, 'user_id' => Auth::id()])->first();
        return $warehouse;
    }
}
