<?php

namespace App\Http\Controllers\SearchController;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class SearchController extends Controller {
    public function search(Request $request) {
        $date = explode(" - ", $request->datefilter);
        $cut_a_date = explode("/", $date[0]);
        $cut_c_date = explode("/", $date[1]);
        $cut_b_date = $cut_a_date[2] . "/" . $cut_a_date[1] . "/" . $cut_a_date[0];
        $cut_d_date = $cut_c_date[2] . "/" . $cut_c_date[1] . "/" . $cut_c_date[0];
        $orders = Order::whereDate('created_at', '>=', $cut_b_date)->whereDate('created_at', '<=', $cut_d_date)->get();

        return view('order.view-order', compact('orders'));
    }
}
