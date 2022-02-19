<?php

namespace App\Http\Controllers\CodController;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;



class CodController extends Controller
{

    public function showCOD()
    {
        $tomonth = now()->format('Y-m');
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('cod-table.cod-table', compact('warehouses','tomonth'));
    }


    // ปฏิทิน COD
    public function event() {

        $json_data = array();
        $arr_events = array();
        $key = null;
        $a = 0;

        for($i=1; $i<=15; $i++){
            $demo_start_date = date("Y-m-d");
            if(is_null($key)){
                $key = 0;
            }else{
                $key++;
            }
            $json_data[$key] = array(
                "id" => $i,
                "groupId" => date("Ymd",strtotime($demo_start_date)),
                "start" => date("Y-m-d",strtotime($demo_start_date)),
                "title" => "จำนวน COD {$a}",
                "url" => "",
                "textColor" => "#FFFFFF",
                "borderColor" => "transparent",
            );
            $json_data[$key]["start"] = date("Y-m-d",strtotime($demo_start_date." -$i day"));
        }

        return response()->json($json_data);

    }
    // END ปฏิทิน COD

}
