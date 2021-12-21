<?php

namespace App\Http\Controllers\CourierController;

use App\Http\Controllers\Controller;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use Carbon\Carbon;

class CourierController extends Controller {
    public function showCourier() {
        return view('courier.courier');
    }

    public function getNotification() {
        $get = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'date' => Carbon::now('Asia/Bangkok')->isoFormat('YYYY-MM-DD'),
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/notifications", $get);
    }

    public function notifyCourier() {
        $notify = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'warehouseNo' => "",
            'srcName' => "",
            'srcPhone' => "",
            'srcProvinceName' => "",
            'srcCityName' => "",
            'srcDistrictName' => "",
            'srcPostalCode' => "",
            'srcDetailAddress' => "",
            'estimate_price' => "",
            'remarks' => "",
        ]);

        $post = FlashCoreFunction::postRequest("https://open-api.flashexpress.com/open/v1/notify", $notify);
    }

    public function cancelNotification() {
        $url = "/open/v1/notify/{id}/cancel";
        $cancel = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
        ]);
        $post = FlashCoreFunction::postRequest($url, $cancel);
    }
}
