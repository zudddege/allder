<?php

namespace App\Http\Controllers\OrderController;

use App\Http\Controllers\AddressBookController\AddressController;
use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use App\Models\Order\Order;
use App\Models\Warehouse\Warehouse;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    public function showOrder() {
        $orders = Order::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1,function($query){
            return $query;
        })->when(Auth::user()->is_admin == 0,function($query){
            return $query->where('user_id', Auth::id());
        })->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1,function($query){
            return $query;
        })->when(Auth::user()->is_admin == 0,function($query){
            return $query->where('user_id', Auth::id());
        })->get();

        return view('order.view-order', compact('orders', 'warehouses'));
    }

    public function addOrder() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $addressBooks = AddressBook::orderBy('updated_at', 'desc')->where('user_id', Auth::id())->get();
        $mainBook = $addressBooks->where('is_main', '1')->first();


        return view('order.add-order', compact('addressBooks','mainBook','warehouses'));
    }

    public function detailOrder($id) {
        $order = Order::find($id);
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('order.detail-order', compact('order','warehouses'));
    }

    public function editOrder($id) {
        $order = Order::find($id);
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('order.edit-order', compact('order', 'addressBooks','warehouses'));
    }

    public function genOrderNo() {
        $order_no = Carbon::now('Asia/Bangkok')->isoFormat('YYMMDD');
        $order_no .= "PY01";
        $order_today = Order::select('created_at')->whereDate('created_at', Carbon::today())->count() + 1;
        $order_no .= str_pad($order_today, 3, '0', STR_PAD_LEFT);

        return $order_no;
    }

    public function createOrder(Request $request) {


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


        $id = auth()->user()->id;
        $accountRate = User::select('discount_rate', 'cod_rate')->find($id);

        $create = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'outTradeNo' => $request->order_no,
            'expressCategory' => $request->is_express_transport == 1 ? 2 : 1,
            'srcName' => $request->send_name,
            'srcPhone' => $request->send_tel,
            'srcProvinceName' => $request->send_province,
            'srcCityName' => $request->send_city,
            'srcDistrictName' => $request->send_district,
            'srcPostalCode' => $request->send_postal_code,
            'srcDetailAddress' => $request->send_detail,
            'dstName' => $request->recv_name,
            'dstPhone' => $request->recv_tel,
            'dstProvinceName' => $request->recv_province,
            'dstCityName' => $request->recv_city,
            'dstDistrictName' => $request->recv_district,
            'dstPostalCode' => $request->recv_postal_code,
            'dstDetailAddress' => $request->recv_detail,
            'articleCategory' => intval($request->category),
            'weight' => ($request->weight) * 1000,
            'width' => $request->width_size,
            'length' => $request->length_size,
            'height' => $request->height_size,
            'insured' => $request->is_protect_insurance ? 1 : 0,
            'freightInsureEnabled' => $request->is_return_insurance ? 1 : 0,
            'opdInsureEnabled' => $request->is_damage_insurance ? 1 : 0,
            'codEnabled' => $request->order_cod == "0" ? 0 : 1,
            'codAmount' => ($request->order_cod) * 100,
            'remark' => $request->note_detail,
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v3/orders", $create);
        $response = json_decode($post, true);

        if ($response['message'] == "success") {
            $tracking_no = $response['data']['pno'];
            $rate = FlashCoreFunction::buildRequestParam([
                'mchId' => 'AA0594',
                'nonceStr' => time(),
                'srcProvinceName' => $request->send_province,
                'srcCityName' => $request->send_city,
                'srcDistrictName' => $request->send_district,
                'srcPostalCode' => $request->send_postal_code,
                'dstProvinceName' => $request->recv_province,
                'dstCityName' => $request->recv_city,
                'dstDistrictName' => $request->recv_district,
                'dstPostalCode' => $request->recv_postal_code,
                'weight' => ($request->weight) * 1000,
                'width' => $request->width_size,
                'length' => $request->length_size,
                'height' => $request->height_size,
                'expressCategory' => $request->is_express_transport == 1 ? 2 : 1,
                'pricingTable' => 0,
            ]);

            $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/orders/estimate_rate", $rate);
            $response = json_decode($post, true);
            $order_price = $response['data']['estimatePrice'];

            $user_price = round($order_price * (1 - (($accountRate->discount_rate) / 100)) / 100, 2);
            $user_cod = round($request->order_cod * (1 - (($accountRate->cod_rate) / 100)), 2);

            if ($request->main_address == 1) {
                (new AddressController)->updateMainAddress(Auth::id());
            }

            if ($request->save_send_address) {
                AddressBook::create([
                    'user_id' => Auth::id(),
                    'book_no' => $request->book_no,
                    'book_name' => $request->send_name,
                    'book_tel' => $request->send_tel,
                    'book_detail' => $request->send_detail,
                    'book_district' => $request->send_district,
                    'book_city' => $request->send_city,
                    'book_province' => $request->send_province,
                    'book_postal_code' => $request->send_postal_code,
                    'is_main' => $request->main_address ? true : false,
                ]);
            }

            if ($request->save_recv_address) {
                AddressBook::create([
                    'user_id' => auth()->user()->id,
                    'book_no' => $request->book_no,
                    'book_name' => $request->recv_name,
                    'book_tel' => $request->recv_tel,
                    'book_detail' => $request->recv_detail,
                    'book_district' => $request->recv_district,
                    'book_city' => $request->recv_city,
                    'book_province' => $request->recv_province,
                    'book_postal_code' => $request->recv_postal_code,
                    'is_main' => false,
                ]);
            }

            Order::create([
                'user_id' => auth()->user()->id,
                'order_no' => $request->order_no,
                'send_name' => $request->send_name,
                'send_tel' => $request->send_tel,
                'send_detail' => $request->send_detail,
                'send_district' => $request->send_district,
                'send_city' => $request->send_city,
                'send_province' => $request->send_province,
                'send_postal_code' => $request->send_postal_code,
                'recv_name' => $request->recv_name,
                'recv_tel' => $request->recv_tel,
                'recv_detail' => $request->recv_detail,
                'recv_district' => $request->recv_district,
                'recv_city' => $request->recv_city,
                'recv_province' => $request->recv_province,
                'recv_postal_code' => $request->recv_postal_code,
                'category_text' => $category_text,
                'weight' => $request->weight,
                'width' => $request->width,
                'length' => $request->length,
                'height' => $request->height,
                'order_cod' => $request->order_cod,
                'order_price' => $order_price /100,
                'user_cod' => $user_cod ,
                'user_price' => $user_price,
                'note_detail' => $request->note_detail,
                'is_return_insurance' => $request->is_return_insurance ? true : false,
                'is_protect_insurance' => $request->is_protect_insurance ? true : false,
                'is_express_transport' => $request->is_express_transport ? true : false,
                'is_damage_insurance' => $request->is_damage_insurance ? true : false,
                'tracking_no' => $tracking_no,
                'original_tracking' => $request->original_tracking,
                'status_text' => "รอปริ้น",
            ]);
        } else {
            dd($post);
        }

        return redirect('/orders');
    }

    public function modifyOrder(Request $request, $id) {

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

        $trackingNo = Order::find($id)->tracking_no;



        $edit = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'pno' => $trackingNo,
            'expressCategory' => $request->is_express_transport == 1 ? "2" : "1",
            'srcName' => $request->send_name,
            'srcPhone' => $request->send_tel,
            'srcDetailAddress' => $request->send_detail,
            'dstName' => $request->recv_name,
            'dstPhone' => $request->recv_tel,
            'dstProvinceName' => $request->recv_province,
            'dstCityName' => $request->recv_city,
            'dstDistrictName' => $request->recv_district,
            'dstPostalCode' => $request->recv_postal_code,
            'dstDetailAddress' => $request->recv_detail,
            'articleCategory' => $request->category,
            'weight' => intval(($request->weight) * 1000),
            'width' => $request->width_size,
            'length' => $request->length_size,
            'height' => $request->height_size,
            'insured' => $request->is_protect_insurance ? 1 : 0,
            'freightInsureEnabled' => $request->is_return_insurance ? 1 : 0,
            'opdInsureEnabled' => $request->is_damage_insurance ? 1 : 0,
            'codEnabled' => $request->order_cod == "0" ? 0 : 1,
            'codAmount' => $request->order_cod * 100, //บัคใส่0ได้ไม่ไดแต่ใส่0.ได้หรือ0.00,0.0
            'remark' => $request->note_detail,
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/orders/modify", $edit);

        $response = json_decode($post, true);
        if ($response['message'] == 'success') {
            $rate = FlashCoreFunction::buildRequestParam([
                'mchId' => 'AA0594',
                'nonceStr' => time(),
                'srcProvinceName' => $request->send_province,
                'srcCityName' => $request->send_city,
                'srcDistrictName' => $request->send_district,
                'srcPostalCode' => $request->send_postal_code,
                'dstProvinceName' => $request->recv_province,
                'dstCityName' => $request->recv_city,
                'dstDistrictName' => $request->recv_district,
                'dstPostalCode' => $request->recv_postal_code,
                'weight' => ($request->weight) * 1000,
                'width' => $request->width_size,
                'length' => $request->length_size,
                'height' => $request->height_size,
                'expressCategory' => $request->is_express_transport == 1 ? 2 : 1,
                'pricingTable' => 0,
            ]);

            $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/orders/estimate_rate", $rate);
            $response = json_decode($post, true);
            $order_price = $response['data']['estimatePrice'];
            Auth::id();
            $cod = Auth::user()->cod_rate;
            $discount = Auth::user()->discount_rate;
            $user_cod = round($request->order_cod * (1 - (($cod) / 100)), 2);
            $user_price = round($order_price * (1 - (($discount) / 100)) / 100, 2);


            if ($request->save_send_address) {
                AddressBook::create([
                    'user_id' => Auth::id(),
                    'book_no' => $request->book_no,
                    'book_name' => $request->send_name,
                    'book_tel' => $request->send_tel,
                    'book_detail' => $request->send_detail,
                    'book_district' => $request->send_district,
                    'book_city' => $request->send_city,
                    'book_province' => $request->send_province,
                    'book_postal_code' => $request->send_postal_code,
                    'is_main' => $request->main_address ? true : false,
                ]);
            }

            if ($request->save_recv_address) {
                AddressBook::create([
                    'user_id' => auth()->user()->id,
                    'book_no' => $request->book_no,
                    'book_name' => $request->recv_name,
                    'book_tel' => $request->recv_tel,
                    'book_detail' => $request->recv_detail,
                    'book_district' => $request->recv_district,
                    'book_city' => $request->recv_city,
                    'book_province' => $request->recv_province,
                    'book_postal_code' => $request->recv_postal_code,
                    'is_main' => false,
                ]);
            }

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
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'order_cod' => $request->order_cod,
                'order_price' => $order_price /100,
                'user_cod' => $user_cod,
                'user_price' => $user_price,
                'is_return_insurance' => $request->is_return_insurance ? true : false,
                'is_protect_insurance' => $request->is_protect_insurance ? true : false,
                'is_express_transport' => $request->is_express_transport ? true : false,
                'is_damage_insurance' => $request->is_damage_insurance ? true : false,
                'note_detail' => $request->note_detail,
            ]);
        } else {
            dd($post);
        }

        return redirect('/orders');
    }

    public function cancelOrder(Request $request, $id) {
        $tracking_no = Order::find($id)->tracking_no;
        $url = "https://open-api.flashexpress.com/open/v1/orders/" . $tracking_no . "/cancel";

        $cancel = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $cancel);
        $response = json_decode($post, true);

        if ($response['message'] == 'success') {
            Order::find($id)->update([
                'status_text' => "ยกเลิก",
                'cancel_reason' => $request->cancel_reason,
            ]);
        } else {
            dd($post);
        }

        return redirect('orders/' . $id . '/detail');
    }

    public function printLabel($id) {
        $tracking_no = Order::find($id)->tracking_no;
        $url = "https://open-api.flashexpress.com/open/v1/orders/" . $tracking_no . "/small/pre_print";

        $print = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $print);
        Order::find($id)->update(['status_text' => "ปริ้นแล้ว"]);

        return response($post)->header('Content-type', 'application/pdf');
    }

}
