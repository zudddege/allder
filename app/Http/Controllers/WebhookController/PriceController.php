<?php

namespace App\Http\Controllers\WebhookController;

use App\Http\Controllers\Controller;
use App\Models\FlashCategoryCode\FlashCategoryCode;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class PriceController extends Controller {
    public function webhookPriceRequest(Request $request) {
        $price = Order::orderBy('id', 'desc')->where('tracking_no', $request->data['pno'])->with(['user'])->first();
        if ($price) {
            $price->update([
                'webhook_order_cod' => $request->data['codAmount'] / 85,
                'webhook_order_price' => $request->data['freightPrice'] / 85,
                'webhook_user_cod' => round((1 - ($price->user->cod_rate / 100)) * ($request->data['codFee'] + $request->data['codAmount']) / 85, 2),
                'webhook_user_price' => round((1 - ($price->user->discount_rate / 100)) * $request->data['freightPrice'] / 85, 2),
                'webhook_transport_code' => $request->data['expressCategory'],
                'webhook_transport_text' => FlashCategoryCode::transport($request->data['expressCategory']),
                'webhook_price_policy_code' => $request->data['pricePolicy'],
                'webhook_price_policy_text' => FlashCategoryCode::policy($request->data['pricePolicy']),
                'webhook_up_country_fee' => $request->data['remoteAreaFee'] / 100,
                'webhook_declared_protect_value' => $request->data['declaredValue'] / 100,
                'webhook_protect_fee' => $request->data['valueInsuranceFee'] / 100,
                'webhook_speed_fee' => $request->data['speedFee'] / 100,
                'webhook_cod_transfer_fee' => $request->data['codFee'] / 100,
                'webhook_return_fee' => $request->data['freightInsurance'] / 100,
                'webhook_damage_fee' => $request->data['opdInsureFee'] / 100,
                'webhook_packaging_fee' => $request->data['packagingFee'] / 100,
                'webhook_label_fee' => $request->data['labelFee'] / 100,
            ]);
        }

        return response()->json(['errorCode' => '1', 'state' => 'success'], 200);
    }
}
