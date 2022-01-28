<?php

namespace App\Http\Controllers\WebhookController;

use App\Http\Controllers\Controller;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    public function webhookServiceRequest(Request $request) {
        $url = "https://open-api.flashexpress.com/open/v1/setting/web_hook_service";
        $service = FlashCoreFunction::buildRequestParam([
            'mchId' => 'AA0594',
            'nonceStr' => time(),
            'serviceCategory' => $request->serviceCategory,
            'url' => $request->url,
            'webhookApiCode' => $request->webhookApiCode,
        ]);

        $post = FlashCoreFunction::postRequest($url, $service);
        return response()->json(['errorCode' => '1', 'state' => 'success'], 200);
    }
}
