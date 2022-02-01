<?php

namespace App\Http\Controllers\ProblemOrderController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemOrderController extends Controller
{

    public function showProlemOrder()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('problem-order.problem-order', compact('warehouses'));
    }

}
