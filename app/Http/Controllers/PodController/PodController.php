<?php

namespace App\Http\Controllers\PodController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodController extends Controller
{

    public function showPOD() {
        $orders = Order::all();
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('pod-table.pod-table', compact('orders','warehouses'));
    }

    public function detailpod() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('pod-table.detail-pod', compact('warehouses'));
    }

}
