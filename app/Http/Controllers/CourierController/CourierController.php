<?php

namespace App\Http\Controllers\CourierController;

use App\Http\Controllers\Controller;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use App\Models\Courier\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller {
    public function showCourier() {
        $notifications = Courier::all();

        return view('courier.courier', compact('notifications'));
    }

    public function getNotification() {
        $get = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'date' => "2021-12-28",
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/notifications", $get);
        dd($post);
    }

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

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/Courier", $notify);
        $response = json_decode($post, true);

        if ($response['message'] == "success") {
            Courier::create([
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
                'estimate_parcel_quantity' => $request->estimate_parcel_quantity,
                'parcel_quantity' => "0",
                'status' => "รอรับพัสดุ",
                'note_detail' => $request->note_detail,
                'staff_id' => $response['data']['staffInfoId'],
                'staff_name' => $response['data']['staffInfoName'],
                'staff_tel' => $response['data']['staffInfoPhone'],
                'timeout_text' => $response['data']['timeoutAtText'],
                'ticket_message' => $response['data']['ticketMessage'],
                'notice' => $response['data']['notice'],
            ]);
        }

        return redirect('/courier');
    }

    public function cancelNotification(Request $request) {
        $pickupId = $request->id; /* Courier::find($request->id)->pickup_id; */
        $url = "https://open-api.flashexpress.com/open/v1/Courier/" . $pickupId . "/cancel";

        $cancel = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);

        $post = FlashCoreFunction::postRequest($url, $cancel);
        dd($post);
    }
}
