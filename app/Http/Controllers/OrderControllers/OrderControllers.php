<?php

namespace App\Http\Controllers\OrderControllers;


use App\User;
use Carbon\Carbon;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;

class OrderControllers extends Controller
{
    function showorder()
    {
        $order = order::all()->toArray();
        return view('order',compact('order'));
    }
    public function addOrder(){
        $order_no = Carbon::now('Asia/Bangkok')->isoFormat("YYMMDD");
        $order_no .= "PY01";
        $order_no .= "001";
        return view('addOrder')->with("order_no",  $order_no);
    }

    public function saveOrder(Request $request){
        $data = $request->all();

        if($request->is_main_book == "1"){
            /*  TODO: เปลี่ยนที่อยู่หลักของบัญชีนี้ */
        }

        if($request->save_send_address == "1" ){
            $send_book = AddressBook::create([
                "user_id"=>$request->user_id,
                "book_no"=>$request->book_no,
                "book_name"=>$request->send_name,
                "book_tel"=>$request->send_tel,
                "book_area"=>$request->send_area,
                "book_address"=>$request->send_address,
                "is_main_book"=>$request->main_address ? true : false
            ]);
        }

        if($request->save_recv_address == "1"){
            $recv_book = AddressBook::create([
                "user_id"=>$request->user_id,
                "book_no"=>$request->book_no,
                "book_name"=>$request->recv_name,
                "book_tel"=>$request->recv_tel,
                "book_area"=>$request->recv_area,
                "book_address"=>$request->recv_address
            ]);
        }
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
    public function importExportView()
    {
       return view('importexport');
    }
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return redirect()->back();
    } 
    
}
