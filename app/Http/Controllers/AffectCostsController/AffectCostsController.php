<?php

namespace App\Http\Controllers\AffectCostsController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffectCostsController extends Controller
{

    public function showaffectcosts()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('affect-cost.affect-cost', compact('warehouses'));
    }

}
