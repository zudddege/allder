<?php

namespace App\Http\Controllers\OrderController;

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
        $orders = Order::all();
        $warehouses = Warehouse::all();

        return view('order.view-order', compact('orders', 'warehouses'));
    }

    public function addOrder() {
        $mainBook = AddressBook::select('book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code', 'is_main')->where('is_main', true)->first();
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();

        return view('order.add-order', compact('addressBooks', 'mainBook'));
    }

    public function detailOrder($id) {
        $order = Order::find($id);

        return view('order.detail-order', compact('order'));
    }

    public function editOrder($id) {
        $order = Order::find($id);
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->get();

        return view('order.edit-order', compact('order', 'addressBooks'));
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
            'codEnabled' => $request->cod == "0" ? 0 : 1,
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
            $user_cod = $response['data']['estimatePrice'];

            $user_price = round($user_cod * (1 - (($accountRate->discount_rate) / 100)) / 100, 2);
            $order_price = round($request->order_cod * (1 - (($accountRate->cod_rate) / 100)), 2);

            if ($request->main_address) {
                AddressBook::where('is_main', 1)->update(['is_main' => false]);
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
                'order_price' => $order_price,
                'user_cod' => $user_cod / 100,
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

        return redirect('/order');
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
            'codEnabled' => $request->cod == "0" ? 0 : 1,
            'codAmount' => ($request->cod) * 100,
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
            $user_cod = $response['data']['user_cod'];

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
                'user_cod' => $user_cod / 100,
                'is_return_insurance' => $request->is_return_insurance ? true : false,
                'is_protect_insurance' => $request->is_protect_insurance ? true : false,
                'is_express_transport' => $request->is_express_transport ? true : false,
                'is_damage_insurance' => $request->is_damage_insurance ? true : false,
                'note_detail' => $request->note_detail,
            ]);
        } else {
            dd($post);
        }

        return redirect('order/' . $id . '/detail');
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

        return redirect('order/' . $id . '/detail');
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

        // แปลง array เป็นรูปแบบ json string
        if(isset($json_data)){
            $json= json_encode($json_data);
            if(isset($_GET['callback']) && $_GET['callback']!=""){
            echo $_GET['callback']."(".$json.");";
            }else{
            echo $json;
            }
        }
    }
    // END ปฏิทิน COD

}


