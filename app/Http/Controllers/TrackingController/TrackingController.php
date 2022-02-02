<?php

namespace App\Http\Controllers\TrackingController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{

    public function showTracking()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('tracking.check-order', compact('warehouses'));
    }

}
