<?php

namespace App\Http\Controllers\OrderControllers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\AddressBook\AddressBook;
use App\Models\FlashCoreFunction\FlashCoreFunction;
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
        $date = explode(" - ", $request->datefilter);
        $cut_a_date = explode("/", $date[0]);
        $cut_c_date = explode("/", $date[1]);
        $cut_b_date = $cut_a_date[2] . "/" . $cut_a_date[1] . "/" . $cut_a_date[0];
        $cut_d_date = $cut_c_date[2] . "/" . $cut_c_date[1] . "/" . $cut_c_date[0];
        $orders = Order::whereDate('created_at', '>=', $cut_b_date)->whereDate('created_at', '<=', $cut_d_date)->get();

        return view('order', compact('orders'));
    }

    public function addOrder() {
        $address_book = AddressBook::select('book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code', 'is_main_book')->where('is_main_book', true)->first();
        if (!$address_book) {
            $address_book = AddressBook::all();
            $address_book->book_name = "";
            $address_book->book_tel = "";
            $address_book->book_detail = "";
            $address_book->book_district = "";
            $address_book->book_city = "";
            $address_book->book_province = "";
            $address_book->book_postal_code = "";
            $address_book->is_main_book = "";
        }

        return view('addOrder', compact('address_book'));
    }

    public function saveOrder(Request $request) {
        switch ($request->category) {
        case ('0'): $category_text = "เอกสาร";
            break;
        case ('1'): $category_text = "อาหารแห้ง";
            break;
        case ('2'): $category_text = "ของใช้ทั่วไป";
            break;
        case ('3'): $category_text = "อุปกรณ์ไอที";
            break;
        case ('4'): $category_text = "เสื้อผ้า";
            break;
        case ('5'): $category_text = "สื่อบันเทิง";
            break;
        case ('6'): $category_text = "อะไหล่ยนต์";
            break;
        case ('7'): $category_text = "รองเท้า/กระเป๋า";
            break;
        case ('8'): $category_text = "อุปกรณ์กีฬา";
            break;
        case ('9'): $category_text = "เครื่องสำอางค์";
            break;
        case ('10'): $category_text = "เฟอร์นิเจอร์";
            break;
        case ('11'): $category_text = "ผลไม้";
            break;
        case ('99'): $category_text = "อื่นๆ";
            break;
        }

        $create = FlashCoreFunction::buildRequestParam([
            "mchId" => 'AA0594',
            "nonceStr" => time(),
            "expressCategory" => $request->is_express_transport == 1 ? 2 : 1,
            "srcName" => $request->send_name,
            "srcPhone" => $request->send_tel,
            "srcProvinceName" => $request->send_province,
            "srcCityName" => $request->send_city,
            "srcDistrictName" => $request->send_district,
            "srcPostalCode" => $request->send_postal_code,
            "srcDetailAddress" => $request->send_detail,
            "dstName" => $request->recv_name,
            "dstPhone" => $request->recv_tel,
            "dstProvinceName" => $request->recv_province,
            "dstCityName" => $request->recv_city,
            "dstDistrictName" => $request->recv_district,
            "dstPostalCode" => $request->recv_postal_code,
            "dstDetailAddress" => $request->recv_detail,
            "articleCategory" => intval($request->category),
            "weight" => ($request->weight) * 1000,
            "width" => $request->width_size,
            "length" => $request->length_size,
            "height" => $request->height_size,
            "insured" => $request->is_protect_insurance ? 1 : 0,
            "freightInsureEnabled" => $request->is_return_insurance ? 1 : 0,
            "opdInsureEnabled" => $request->is_damage_insurance ? 1 : 0,
            "codEnabled" => $request->cod == "0" ? 0 : 1,
            "codAmount" => ($request->cod) * 100,
            "remark" => $request->note_detail,
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v3/orders", $create);
        $response = json_decode($post, true);

        if ($response["message"] == "success") {
            $tracking_no = $response["data"]["pno"];
            $rate = FlashCoreFunction::buildRequestParam([
                "mchId" => 'AA0594',
                "nonceStr" => time(),
                "srcProvinceName" => $request->send_province,
                "srcCityName" => $request->send_city,
                "srcDistrictName" => $request->send_district,
                "srcPostalCode" => $request->send_postal_code,
                "dstProvinceName" => $request->recv_province,
                "dstCityName" => $request->recv_city,
                "dstDistrictName" => $request->recv_district,
                "dstPostalCode" => $request->recv_postal_code,
                "weight" => ($request->weight) * 1000,
                "width" => $request->width_size,
                "length" => $request->length_size,
                "height" => $request->height_size,
                "expressCategory" => $request->is_express_transport == 1 ? "2" : "1",
                "pricingTable" => 0,
            ]);

            $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/orders/estimate_rate", $rate);
            $response = json_decode($post, true);
            $estimate_price = $response["data"]["estimatePrice"];

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
                    "book_detail" => $request->send_detail,
                    "book_district" => $request->send_district,
                    "book_city" => $request->send_city,
                    "book_province" => $request->send_province,
                    "book_postal_code" => $request->send_postal_code,
                    "is_main_book" => $request->main_address ? true : false,
                ]);
            }

            if ($request->save_recv_address) {
                AddressBook::create([
                    "user_id" => $request->user_id,
                    "book_no" => $request->book_no,
                    "book_name" => $request->recv_name,
                    "book_tel" => $request->recv_tel,
                    "book_detail" => $request->recv_detail,
                    "book_district" => $request->recv_district,
                    "book_city" => $request->recv_city,
                    "book_province" => $request->recv_province,
                    "book_postal_code" => $request->recv_postal_code,
                    "is_main_book" => false,
                ]);
            }

            Order::create([
                "user_id" => $request->user_id,
                "wh_no" => $request->wh_no,
                "order_no" => $request->order_no,
                "send_name" => $request->send_name,
                "send_tel" => $request->send_tel,
                "send_detail" => $request->send_detail,
                "send_district" => $request->send_district,
                "send_city" => $request->send_city,
                "send_province" => $request->send_province,
                "send_postal_code" => $request->send_postal_code,
                "recv_name" => $request->recv_name,
                "recv_tel" => $request->recv_tel,
                "recv_detail" => $request->recv_detail,
                "recv_district" => $request->recv_district,
                "recv_city" => $request->recv_city,
                "recv_province" => $request->recv_province,
                "recv_postal_code" => $request->recv_postal_code,
                "category" => $category_text,
                "weight" => $request->weight,
                "width_size" => $request->width_size,
                "length_size" => $request->length_size,
                "height_size" => $request->height_size,
                "cod" => $request->cod,
                "estimate_price" => $estimate_price / 100,
                "note_detail" => $request->note_detail,
                "is_return_insurance" => $request->is_return_insurance ? true : false,
                "is_protect_insurance" => $request->is_protect_insurance ? true : false,
                "is_express_transport" => $request->is_express_transport ? true : false,
                "is_damage_insurance" => $request->is_damage_insurance ? true : false,
                "tracking_no" => $tracking_no,
                "original_tracking" => $request->original_tracking,
                "status" => "รอรับพัสดุ",
            ]);
        } else {
            dd($post);
        }

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
        $addressBook = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();

        return response()->json($addressBook);
    }

    public function fetchBook(Request $request) {
        $book_details = AddressBook::find($request->id);

        return $book_details;
    }

    public function callcourier() {
        return view('courier.callcourier');
    }

    public function detail($id) {
        $order = Order::find($id);

        return view('detail', compact('order'));
    }

    public function edit($id) {
        $order = Order::find($id);

        return view('edit', compact('order'));
    }

    public function editOrder(Request $request, $id) {
        switch ($request->category) {
        case ('0'): $category_text = "เอกสาร";
            break;
        case ('1'): $category_text = "อาหารแห้ง";
            break;
        case ('2'): $category_text = "ของใช้ทั่วไป";
            break;
        case ('3'): $category_text = "อุปกรณ์ไอที";
            break;
        case ('4'): $category_text = "เสื้อผ้า";
            break;
        case ('5'): $category_text = "สื่อบันเทิง";
            break;
        case ('6'): $category_text = "อะไหล่ยนต์";
            break;
        case ('7'): $category_text = "รองเท้า/กระเป๋า";
            break;
        case ('8'): $category_text = "อุปกรณ์กีฬา";
            break;
        case ('9'): $category_text = "เครื่องสำอางค์";
            break;
        case ('10'): $category_text = "เฟอร์นิเจอร์";
            break;
        case ('11'): $category_text = "ผลไม้";
            break;
        case ('99'): $category_text = "อื่นๆ";
            break;
        }

        $tracking_no = Order::find($id)->tracking_no;

        $edit = FlashCoreFunction::buildRequestParam([
            "mchId" => 'AA0594',
            "nonceStr" => time(),
            "pno" => $tracking_no,
            "expressCategory" => $request->is_express_transport == 1 ? "2" : "1",
            "srcName" => $request->send_name,
            "srcPhone" => $request->send_tel,
            "srcDetailAddress" => $request->send_detail,
            "dstName" => $request->recv_name,
            "dstPhone" => $request->recv_tel,
            "dstProvinceName" => $request->recv_province,
            "dstCityName" => $request->recv_city,
            "dstDistrictName" => $request->recv_district,
            "dstPostalCode" => $request->recv_postal_code,
            "dstDetailAddress" => $request->recv_detail,
            "articleCategory" => $request->category,
            "weight" => intval(($request->weight) * 1000),
            "width" => $request->width_size,
            "length" => $request->length_size,
            "height" => $request->height_size,
            "insured" => $request->is_protect_insurance ? 1 : 0,
            "freightInsureEnabled" => $request->is_return_insurance ? 1 : 0,
            "opdInsureEnabled" => $request->is_damage_insurance ? 1 : 0,
            "codEnabled" => $request->cod == "0" ? 0 : 1,
            "codAmount" => ($request->cod) * 100,
            "remark" => $request->note_detail,
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/orders/modify", $edit);
        $response = json_decode($post, true);

        if ($response["message"] == "success") {
            Order::find($id)->update([
                'send_name' => $request->send_name,
                'send_tel' => $request->send_tel,
                'send_detail' => $request->send_detail,
                'recv_name' => $request->recv_name,
                'recv_tel' => $request->recv_tel,
                'recv_detail' => $request->recv_detail,
                'recv_district' => $request->recv_district,
                'recv_city' => $request->recv_city,
                'recv_province' => $request->recv_province,
                'recv_postal_code' => $request->recv_postal_code,
                'category' => $category_text,
                'weight' => $request->weight,
                'length_size' => $request->length_size,
                'weight_type' => $request->weight_type,
                'height' => $request->height,
                'cod' => $request->cod,
                'is_return_insurance' => $request->is_return_insurance ? true : false,
                'is_protect_insurance' => $request->is_protect_insurance ? true : false,
                'is_express_transport' => $request->is_express_transport ? true : false,
                'is_damage_insurance' => $request->is_damage_insurance ? true : false,
                'note_detail' => $request->note_detail,
            ]);
        } else {
            dd($edit);
        }

        return redirect('detail/' . $id);
    }

    public function cancel(Request $request, $id) {
        $tracking_no = Order::find($id)->tracking_no;
        $url = "https://open-api.flashexpress.com/open/v1/orders/" . $tracking_no . "/cancel";

        $cancel = FlashCoreFunction::buildRequestParam([
            "mchId" => 'AA0594',
            "nonceStr" => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $cancel);
        $response = json_decode($post, true);

        if ($response["message"] == "success") {
            Order::find($id)->update([
                'status' => "ยกเลิก",
                'cancel_reason' => $request->cancel_reason,
            ]);
        } else {
            dd($post);
        }

        return redirect('detail/' . $id);
    }

    public function login() {
        return view('Login_page.login');
    }

    public function ordersuccess() {
        $orders = Order::all();

        return view('ordersuccess', compact('orders'));
    }

    public function printLabel($id) {
        $tracking_no = Order::find($id)->tracking_no;
        $url = "https://open-api.flashexpress.com/open/v1/orders/" . $tracking_no . "/pre_print";

        $print = FlashCoreFunction::buildRequestParam([
            "mchId" => 'AA0594',
            "nonceStr" => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $print);

        return response($post)->header("Content-type", "application/pdf");
    }

    public function subaccount() {
        return view('Sub_account.subaccount');
    }

    public function add_subaccount() {
        return view('Sub_account.add_subaccount');
    }
}
