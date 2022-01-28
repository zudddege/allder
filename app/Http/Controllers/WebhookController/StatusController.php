<?php

namespace App\Http\Controllers\WebhookController;

use App\Http\Controllers\Controller;
use App\Models\FlashCategoryCode\FlashCategoryCode;
use App\Models\FlashCoreFunction\FlashCoreFunction;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class StatusController extends Controller {
    public function webhookStatusRequest(Request $request) {
        if ($request->data['state'] == '5') {
            $url = "https://open-api.flashexpress.com/open/v1/orders/" . $request->data['recentPno'] . "/deliveredInfo";
            $sign = FlashCoreFunction::buildRequestParam([
                'mchId' => 'AA0594',
                'nonceStr' => time(),
            ]);
            $post = FlashCoreFunction::postRequest($url, $sign);
            $response = json_decode($post, true);
            $signer = $response['data']['signer'];
            $signerType = $response['data']['signerTypeText'];
        }

        $status = Order::orderBy('id', 'desc')->where('order_no', $request->data['outTradeNo'])->first();
        $status->update([
            'tracking_no' => $request->data['recentPno'] ?? $status->tracking_no,
            'operator_branch' => $request->data['operationAddress'] ?? $status->operator_branch,
            'problem_code' => $request->data['markerCategory'] ?? $status->problem_code,
            'problem_text' => FlashCategoryCode::problem($request->data['markerCategory'] ?? $status->problem_text),
            'return_no' => $request->data['returnedPno'] ?? $status->return_no,
            'status_code' => $request->data['state'] ?? $status->status_code,
            'status_text' => FlashCategoryCode::status($request->data['state']) ?? $status->status_text,
            'pickup_id' => $request->data['ticketPickupId'] ?? $status->pickup_id,
            'original_no' => $request->data['customPno'] ?? $status->original_no,
            'operator_tel' => $request->data['staffInfoPhone'] ?? $status->operator_tel,
            'operator_id' => $request->data['staffInfoId'] ?? $status->operator_id,
            'signer_name' => $signer ?? $status->signer_name,
            'signer_type' => $signerType ?? $status->signer_type,
            'signature_url' => $request->data['eSignature'] ?? $status->signature_url,
        ]);
        return response()->json(['errorCode' => '1', 'state' => 'success'], 200);
    }
}
