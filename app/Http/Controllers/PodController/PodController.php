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
        $orders = Order::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1,function($query){
            return $query;
        })->when(Auth::user()->is_admin == 0,function($query){
            return $query->where('user_id', Auth::id());
        })->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('pod-table.pod-table', compact('orders','warehouses'));
    }

    public function detailpod($id) {
        $order = Order::find($id);
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('pod-table.detail-pod', compact('warehouses','order'));
    }

}
