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

        $arr_color_demo = array(
            "1"=>"#ffd149",
            "2"=>"#fa42a2",
            "3"=>"#61c419",
            "4"=>"#ff8e25",
            "5"=>"#44c5ed",
            "6"=>"#ca5ec9",
            "7"=>"#ff0000"
        );

        $arr_events = array();
        $key = null;
        for($i=1; $i<=7; $i++){
            $demo_start_date = date("Y-m-01");
            if(is_null($key)){
                $key = 0;
            }else{
                $key++;
            }
            $json_data[$key] = array(
                "id" => $i,
                "groupId" => date("Ymd",strtotime($demo_start_date)),
                "start" => date("Y-m-d",strtotime($demo_start_date)),
                "title" => "รูปแบบกิจกรรม {$i}",
                "url" => "",
                "textColor" => "#FFFFFF",
                "backgroundColor" => $arr_color_demo[$i],
                "borderColor" => "transparent",
            );
            if($i==2){
                $json_data[$key]["end"] = date("Y-m-d",strtotime($demo_start_date." +3 day"));
            }
            if($i==3){
                $json_data[$key]["start"] = date("Y-m-d\T12:00:00",strtotime($demo_start_date." +4 day"));
            }
            if($i==4){
                $json_data[$key]["start"] = date("Y-m-d\T12:00:00",strtotime($demo_start_date." +6 day"));
                $json_data[$key]["end"] = date("Y-m-d\T15:00:00",strtotime($demo_start_date." +6 day"));
            }
            if($i==5){
                $json_data[$key]["start"] = date("Y-m-d\T12:00:00",strtotime($demo_start_date." +7 day"));
                $json_data[$key]["end"] = date("Y-m-d",strtotime($demo_start_date." +9 day"));
            }
            if($i==6){
                $json_data[$key]["start"] = date("Y-m-d",strtotime($demo_start_date." +12 day"));
                $json_data[$key]["end"] = date("Y-m-d",strtotime($demo_start_date." +19 day"));
                $json_data[$key]["startTime"] = "12:00:00";
                $json_data[$key]["endTime"] =  "15:00:00";
                $json_data[$key]["startRecur"] = date("Y-m-d",strtotime($demo_start_date." +12 day"));
                $json_data[$key]["endRecur"] = date("Y-m-d",strtotime($demo_start_date." +20 day"));
            }
            if($i==7){
                $json_data[$key]["start"] = date("Y-m-d",strtotime($demo_start_date." +19 day"));
                $json_data[$key]["end"] = date("Y-m-d",strtotime($demo_start_date." +27 day"));
                $json_data[$key]["startTime"] = "12:00:00";
                $json_data[$key]["endTime"] =  "15:00:00";
                $json_data[$key]["daysOfWeek"] =  array(1,3,4);
                $json_data[$key]["startRecur"] = date("Y-m-d",strtotime($demo_start_date." +19 day"));
                $json_data[$key]["endRecur"] = date("Y-m-d",strtotime($demo_start_date." +28 day"));
            }
        }

        return response()->json($json_data);

    }
    // END ปฏิทิน COD

}
