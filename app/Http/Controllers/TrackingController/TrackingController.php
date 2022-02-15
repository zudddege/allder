<?php

namespace App\Http\Controllers\TrackingController;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{

    public function showTracking()
    {
        $orders = Order::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1,function($query){
            return $query;
        })->when(Auth::user()->is_admin == 0,function($query){
            return $query->where('user_id', Auth::id());
        })->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1,function($query){
            return $query;
        })->when(Auth::user()->is_admin == 0,function($query){
            return $query->where('user_id', Auth::id());
        })->get();
        return view('tracking.check-order', compact('orders','warehouses'));
    }

}
