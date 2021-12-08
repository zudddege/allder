<?php

namespace App\Http\Controllers\OrderControllers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\AddressBook\AddressBook;
use App\Models\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class OrderControllers extends Controller {
    public function showOrder() {
        $orders = Order::all();

        return view('order', compact('orders'));
    }

    public function search(Request $request) {
        $firstdate = explode(" - ", $request->datefilter);
        $adate = explode("/", $firstdate[0]);
        $cdate = explode("/", $firstdate[1]);
        $bdate = $adate[2] . "/" . $adate[1] . "/" . $adate[0];
        $ddate = $cdate[2] . "/" . $cdate[1] . "/" . $cdate[0];
        $orders = Order::whereDate('created_at', '>=', $bdate)->whereDate('created_at', '<=', $ddate)->get();

        return view('order', compact('orders'));
    }

    public function addOrder() {
        $address_book = AddressBook::select('book_name', 'book_tel', 'book_area', 'book_address', 'is_main_book')->where('is_main_book', true)->first();
        if (!$address_book) {
            $address_book = AddressBook::all();
            $address_book->book_name = "";
            $address_book->book_tel = "";
            $address_book->book_area = "";
            $address_book->book_address = "";
            $address_book->is_main_book = "";
        }

        return view('addOrder', compact('address_book'));
    }

    public function saveOrder(Request $request) {
        if ($request->main_address) {
            $main_book = AddressBook::select('id', 'is_main_book')->where('is_main_book', 1)->first();
            if ($main_book) {
                AddressBook::find($main_book->id)->update(['is_main_book' => false]);
            }
        }

        if ($request->save_send_address) {
            AddressBook::create([
                "user_id" => $request->user_id,
                "book_no" => $request->book_no,
                "book_name" => $request->send_name,
                "book_tel" => $request->send_tel,
                "book_area" => $request->send_area,
                "book_address" => $request->send_address,
                "is_main_book" => $request->main_address ? true : false,
            ]);
        }

        if ($request->save_recv_address) {
            AddressBook::create([
                "user_id" => $request->user_id,
                "book_no" => $request->book_no,
                "book_name" => $request->recv_name,
                "book_tel" => $request->recv_tel,
                "book_area" => $request->recv_area,
                "book_address" => $request->recv_address,
                "is_main_book" => false,
            ]);
        }

        Order::create([
            "user_id" => $request->user_id,
            "wh_no" => $request->wh_no,
            "order_no" => $request->order_no,
            "send_name" => $request->send_name,
            "send_tel" => $request->send_tel,
            "send_postal_code" => $request->send_postal_code,
            "send_province" => $request->send_province,
            "send_city" => $request->send_city,
            "send_district" => $request->send_district,
            "send_detail" => $request->send_detail,
            "recv_name" => $request->recv_name,
            "recv_tel" => $request->recv_tel,
            "recv_postal_code" => $request->recv_postal_code,
            "recv_province" => $request->recv_province,
            "recv_city" => $request->recv_city,
            "recv_district" => $request->recv_district,
            "recv_detail" => $request->recv_detail,
            "category" => $request->category,
            "weight" => $request->weight,
            "width_size" => $request->width_size,
            "length_size" => $request->length_size,
            "height_size" => $request->height_size,
            "cod" => $request->cod,
            "note_detail" => $request->note_detail,
            "is_return_insurance" => $request->is_return_insurance ? true : false,
            "is_protect_insurance" => $request->is_protect_insurance ? true : false,
            "is_express_transport" => $request->is_express_transport ? true : false,
            "is_damage_insurance" => $request->is_damage_insurance ? true : false,
            "tracking_no" => $request->tracking_no,
            "original_tracking" => $request->original_tracking,
            "return_tracking" => $request->return_tracking,
            "status" => $request->status,
            "cancel_reason" => $request->cancel_reason,
        ]);

        return redirect('/order');
    }

    public function genOrderNo() {
        $order_no = Carbon::now('Asia/Bangkok')->isoFormat('YYMMDD');
        $order_no .= "PY01";
        $order_today = Order::select('created_at')->whereDate('created_at', Carbon::today())->count() + 1;
        $order_no .= str_pad($order_today, 3, '0', STR_PAD_LEFT);

        return $order_no;
    }

    public function import(Request $request) {
        if ($request->file('image') !== null) {
            $file_path = $request->file('image')->store('document', 'public');
        }
        $path = Storage::disk('public')->path($file_path);
        Excel::import(new UsersImport, $path);

        return redirect()->back();
    }

    public function export() {
        return Excel::download(new UsersExport, 'order.xlsx');
    }

    public function addressBook() {
        $addressBook = AddressBook::select('id', 'book_name', 'book_tel', 'book_area', 'book_address')->get();

        return response()->json($addressBook);
    }

    public function fetchBook(Request $request) {
        $book_details = AddressBook::find($request->id);

        return $book_details;
    }

    public function callcuria() {
        return view('Curia.callcuria');
    }

    public function edit() {
        return view('edit');
    }

    public function remove() {
        return view('remove');
    }

    public function cancel() {
        return view('cancel');
    }

    public function login() {
        return view('Login_page.login');
    }

    public function ordersuccess() {
        $orders = Order::all();

        return view('ordersuccess', compact('orders'));
    }
}
