<?php

namespace App\Http\Controllers\OrderControllers;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class OrderControllers extends Controller
{
    function showorder()
    {
        $order = order::all()->toArray();
        return view('order',compact('order'));
    }
    public function addOrder(){
        $a = "นี่เลขออร์เดอร์นะ";
        return view('addOrder')->with("order_no",  $a);
    }

    public function saveOrder(Request $request){
        $data = $request->all();
        $post = Order::create([
            "name" => $request->name,
            "user_id" => $request->user_id,
            "order_no" => $request->order_no,
            "send_name" => $request->send_name,
            "send_tel" => $request->send_tel,
            "send_area" => $request->send_area,
            "send_address" => $request->send_address,
            "recv_name" => $request->recv_name,
            "recv_tel" => $request->recv_tel,
            "recv_area" => $request->recv_area,
            "recv_address" => $request->recv_address,
            "categories" => $request->categories,
            "weight" => $request->weight,
            "width_size" => $request->width_size,
            "length_size" => $request->length_size,
            "height_size" => $request->height_size,
            "cod" => $request->cod,
            "note_detail" => $request->note_detail,
            "is_return_insurance" => $request->is_return_insurance,
            "is_protect_insurance" => $request->is_protect_insurance,
            "is_express_transport" => $request->is_express_transport,
            "is_damage_insurance" => $request->is_damage_insurance,
            "tracking_no" => $request->tracking_no,
            "original_tracking" => $request->original_tracking,
            "return_tracking" => $request->return_tracking,
            "status" => $request->status,
            "cancel_reason" => $request->cancel_reason,
            "create_time" => $request->create_time,
            "complete_time" => $request->complete_time
        ]);
        return redirect('/order');
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'zudddege.xlsx');
    }
    public function import(Request $request) 
       
    { 
        $file = $request->file ('file ');
        Excel::import(new UsersImport, $file);
        
        return redirect('/')->with('success');
    }



    
}
