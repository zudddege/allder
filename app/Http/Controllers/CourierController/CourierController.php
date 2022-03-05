<?php

namespace App\Http\Controllers\CourierController;

use App\Http\Controllers\Controller;
use App\Models\Courier\Courier;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use App\Models\Warehouse\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller {
    public function showCourier() {
        $couriers = Courier::orderBy('id', 'desc')->when(Auth::user()->is_admin == 1, function ($query) {
            return $query;
        })->when(Auth::user()->is_admin == 0, function ($query) {
            return $query->where('user_id', Auth::id());
        })->get();
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('courier.courier', compact('couriers', 'warehouses'));
    }

    /* public function getNotification(Request $request) {
    $date = $request->date;
    $get = FlashCoreFunction::buildRequestParam([
    'mchId' => 'AA0594',
    'nonceStr' => time(),
    'date' => $date ?? null,
    ]);

    $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/notifications", $get);
    } */

    public function notifyCourier(Request $request) {
        $notify = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'srcName' => $request->warehouse_name,
            'srcPhone' => $request->warehouse_tel,
            'srcProvinceName' => $request->warehouse_province,
            'srcCityName' => $request->warehouse_city,
            'srcDistrictName' => $request->warehouse_district,
            'srcPostalCode' => $request->warehouse_postal_code,
            'srcDetailAddress' => $request->warehouse_detail,
            'estimateParcelNumber' => $request->estimate_parcel_quantity,
            'remark' => $request->note_detail,
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/notify", $notify);
        $response = json_decode($post, true);

        if ($response['message'] == "success") {
            Courier::create([
                'user_id' => Auth::id(),
                'pickup_id' => $response['data']['ticketPickupId'],
                'warehouse_no' => $request->warehouse_no,
                'warehouse_name' => $request->warehouse_name,
                'contact_name' => $request->contact_name,
                'warehouse_tel' => $request->warehouse_tel,
                'warehouse_detail' => $request->warehouse_detail,
                'warehouse_district' => $request->warehouse_district,
                'warehouse_city' => $request->warehouse_city,
                'warehouse_province' => $request->warehouse_province,
                'warehouse_postal_code' => $request->warehouse_postal_code,
                'parcel_quantity' => $request->estimate_parcel_quantity,
                'status_code' => "1",
                'status_text' => "รอรับพัสดุ",
                'note_detail' => $request->note_detail,
                'operator_id' => $response['data']['staffInfoId'],
                'operator_name' => $response['data']['staffInfoName'],
                'operator_tel' => $response['data']['staffInfoPhone'],
                'timeout_text' => $response['data']['timeoutAtText'],
                'ticket_message' => $response['data']['ticketMessage'],
            ]);
        }

        return redirect('/couriers');
    }

    public function cancelNotification(Request $request) {
        $pickupId = Courier::find($request->id)->pickup_id;
        $url = "https://open-api.flashexpress.com//open/v1/notify" . $pickupId . "/cancel";

        $cancel = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);

        FlashCoreFunction::postRequest($url, $cancel);

        return redirect('/couriers');
    }

    public function detailCourier($id) {
        $courier = courier::find($id);
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('courier.detail-courier', compact('warehouses', 'courier'));
    }
}
