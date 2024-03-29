<?php

namespace App\Http\Controllers\OrderController;

use App\Http\Controllers\AddressBookController\AddressController;
use App\Http\Controllers\Controller;
use App\Models\AddressBook\AddressBook;
use App\Models\FlashCategoryCode\FlashCategoryCode;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use App\Models\Order\Order;
use App\Models\Warehouse\Warehouse;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    public function showOrder() {
        $orders = Order::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Auth::user()->is_admin == 0, function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Auth::user()->is_admin == 0, function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();

        return view('order.view-order', compact('orders', 'warehouses'));
    }

    public function addOrder() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $addressBooks = AddressBook::orderBy('updated_at', 'desc')->where('user_id', Auth::id())->get();
        $mainBook = $addressBooks->where('is_main', '1')->first();

        return view('order.add-order', compact('addressBooks', 'mainBook', 'warehouses'));
    }

    public function detailOrder($id) {
        $order = Order::find($id);
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('order.detail-order', compact('order', 'warehouses'));
    }

    public function detailOrderSuc($id) {
        $order = Order::find($id);
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('order.detail-ordersuc', compact('order', 'warehouses'));
    }

    public function editOrder($id) {
        $order = Order::find($id);
        $addressBooks = AddressBook::select('id', 'book_name', 'book_tel', 'book_detail', 'book_district', 'book_city', 'book_province', 'book_postal_code')->where('user_id', Auth::id())->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('order.edit-order', compact('order', 'addressBooks', 'warehouses'));
    }

    public function genOrderNo() {
        $order_no = Carbon::now('Asia/Bangkok')->isoFormat('YYMMDD');
        $order_no .= Auth::user()->short_id;
        $order_today = Order::select('created_at')->where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->count() + 1;
        $order_no .= str_pad($order_today, 3, '0', STR_PAD_LEFT);

        return $order_no;
    }

    public function createOrder(Request $request) {
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
                    'is_main' => $request->main_address ? 1 : 0,
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
                    'is_main' => 0,
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
                'category_code' => $request->category,
                'category_text' => FlashCategoryCode::category($request->category),
                'weight' => $request->weight,
                'width' => $request->width,
                'length' => $request->length,
                'height' => $request->height,
                'order_cod' => $request->order_cod,
                'order_price' => $order_price / 100,
                'user_cod' => $user_cod,
                'user_price' => $user_price,
                'note_detail' => $request->note_detail,
                'is_return_insurance' => $request->is_return_insurance ? 1 : 0,
                'is_protect_insurance' => $request->is_protect_insurance ? 1 : 0,
                'is_express_transport' => $request->is_express_transport ? 1 : 0,
                'is_damage_insurance' => $request->is_damage_insurance ? 1 : 0,
                'tracking_no' => $tracking_no,
                'original_tracking' => $request->original_tracking,
                'status_text' => "รอปริ้น",
                'transport_text' => FlashCategoryCode::transport($request->is_express_transport == 1 ? 2 : 1),
                'price_policy_code' => $response['data']['pricePolicy'],
                'price_policy_text' => FlashCategoryCode::policy($response['data']['pricePolicy']),
                'up_country_fee' => $response['data']['upCountryAmount'],
                'protect_value' => $response['data']['insureDeclareValue'],
                'protect_fee' => $response['data']['valueInsuranceFee'],
                'speed_fee' => $response['data']['speedFee'],
                'cod_transport_fee' => $response['data']['codTransferFee'],
                'return_fee' => $response['data']['freightInsurance'],
                'damage_fee' => $response['data']['opdInsureFee'],
                'source' => "Allder Express",
            ]);
        } else {
            dd($post);
        }

        return redirect('/orders');
    }

    public function modifyOrder(Request $request, $id) {
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
                    'is_main' => $request->main_address ? 1 : 0,
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
                    'is_main' => 0,
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
                'category_code' => $request->category,
                'category_text' => FlashCategoryCode::category($request->category),
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'order_cod' => $request->order_cod,
                'order_price' => $order_price / 100,
                'user_cod' => $user_cod,
                'user_price' => $user_price,
                'is_return_insurance' => $request->is_return_insurance ? 1 : 0,
                'is_protect_insurance' => $request->is_protect_insurance ? 1 : 0,
                'is_express_transport' => $request->is_express_transport ? 1 : 0,
                'is_damage_insurance' => $request->is_damage_insurance ? 1 : 0,
                'note_detail' => $request->note_detail,
                'transport_text' => FlashCategoryCode::transport($request->is_express_transport == 1 ? 2 : 1),
                'price_policy_code' => $response['data']['pricePolicy'],
                'price_policy_text' => FlashCategoryCode::policy($response['data']['pricePolicy']),
                'up_country_fee' => $response['data']['upCountryAmount'],
                'protect_value' => $response['data']['insureDeclareValue'],
                'protect_fee' => $response['data']['valueInsuranceFee'],
                'speed_fee' => $response['data']['speedFee'],
                'cod_transport_fee' => $response['data']['codTransferFee'],
                'return_fee' => $response['data']['freightInsurance'],
                'damage_fee' => $response['data']['opdInsureFee'],
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
                'status_code' => "9",
            ]);
        } else {
            dd($post);
        }

        return redirect('orders/detail/' . $id);
    }

    public function printLabel_S($id) {
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

    public function printLabel_L($id) {
        $tracking_no = Order::find($id)->tracking_no;
        $url = "https://open-api.flashexpress.com/open/v1/orders/" . $tracking_no . "/pre_print";

        $print = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $print);
        Order::find($id)->update(['status_text' => "ปริ้นแล้ว"]);

        return response($post)->header('Content-type', 'application/pdf');
    }

    public function authoCreateOrder(Request $request) {
        $header = $request->header();
        if (!array_key_exists('authorization', $header)) {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }
        $authorization = $header['authorization'][0];
        $token = explode(' ', $authorization);

        if ($token != "") {
            try {
                $codeReturn = "success";
                $msg = "เย้เข้าได้แล้ว";
                $create = (new OrderController)->apiCreateOrder($request);

                return response()->json([
                    'status' => $codeReturn,
                    'message' => $msg,
                    'data' => $create,
                ]);
            } catch (\Throwable $th) {
                $codeReturn = "fail";
                return response()->json([
                    'status' => $codeReturn,
                    'message' => $th,
                ]);
            }

        } else {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }

    }

    public function apiCreateOrder(Request $request) {

        $category_text = FlashCategoryCode::category($request->category);
        $id = auth()->user()->id;
        $accountRate = User::select('discount_rate', 'cod_rate')->find($id);

        $create = FlashCoreFunction::buildRequestParam([
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
                'category_code' => $request->category,
                'category_text' => FlashCategoryCode::category($request->category),
                'weight' => $request->weight,
                'width' => $request->width,
                'length' => $request->length,
                'height' => $request->height,
                'order_cod' => $request->order_cod,
                'order_price' => $order_price / 100,
                'user_cod' => $user_cod,
                'user_price' => $user_price,
                'note_detail' => $request->note_detail,
                'is_return_insurance' => $request->is_return_insurance ? 1 : 0,
                'is_protect_insurance' => $request->is_protect_insurance ? 1 : 0,
                'is_express_transport' => $request->is_express_transport ? 1 : 0,
                'is_damage_insurance' => $request->is_damage_insurance ? 1 : 0,
                'tracking_no' => $tracking_no,
                'original_tracking' => $request->original_tracking,
                'status_text' => "รอปริ้น",
                'transport_text' => FlashCategoryCode::transport($request->is_express_transport == 1 ? 2 : 1),
                'price_policy_code' => $response['data']['pricePolicy'],
                'price_policy_text' => FlashCategoryCode::policy($response['data']['pricePolicy']),
                'up_country_fee' => $response['data']['upCountryAmount'],
                'protect_value' => $response['data']['insureDeclareValue'],
                'protect_fee' => $response['data']['valueInsuranceFee'],
                'speed_fee' => $response['data']['speedFee'],
                'cod_transport_fee' => $response['data']['codTransferFee'],
                'return_fee' => $response['data']['freightInsurance'],
                'damage_fee' => $response['data']['opdInsureFee'],
                'source' => "API",
            ]);
        } else {
            dd($post);
        }

    }

    public function authoeditOrder(Request $request) {

        $header = $request->header();
        if (!array_key_exists('authorization', $header)) {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }
        $authorization = $header['authorization'][0];
        $token = explode(' ', $authorization);
        if ($token != "") {
            try {

                $codeReturn = "success";
                $msg = "เย้เข้าได้แล้ว";
                $id = Order::id();
                $edit = (new OrderController)->modifyOrder($request, $id);

                return response()->json([
                    'status' => $codeReturn,
                    'message' => $msg,
                    'data' => $edit,
                ]);
            } catch (\Throwable $th) {
                $codeReturn = "fail";
                return response()->json([
                    'status' => $codeReturn,
                    'message' => $th,
                ]);
            }

        } else {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }

    }

    public function authocancelOrder(Request $request) {

        $header = $request->header();
        if (!array_key_exists('authorization', $header)) {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }
        $authorization = $header['authorization'][0];
        $token = explode(' ', $authorization);
        if ($token != "") {
            try {

                $codeReturn = "success";
                $msg = "เย้เข้าได้แล้ว";
                $cancel = '';

                return response()->json([
                    'status' => $codeReturn,
                    'message' => $msg,
                    'data' => $cancel,
                ]);
            } catch (\Throwable $th) {
                $codeReturn = "fail";
                return response()->json([
                    'status' => $codeReturn,
                    'message' => $th,
                ]);
            }

        } else {
            $codeReturn = "error";
            $msg = "unauthorized";

            return response()->json([
                'status' => $codeReturn,
                'message' => $msg,
            ], 401);
        }

    }
}
