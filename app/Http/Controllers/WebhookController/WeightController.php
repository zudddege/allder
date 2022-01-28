<?php

namespace App\Http\Controllers\WebhookController;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class WeightController extends Controller {
    public function webhookWeightRequest(Request $request) {
        $weight = Order::where('order_no', $request->data['outTradeNo'])->first();
        $weight->update([
            'webhook_weight' => $request->data['weight'],
            'webhook_lenght' => $request->data['length'],
            'webhook_width' => $request->data['width'],
            'webhook_height' => $request->data['height'],
        ]);
        return response()->json(['errorCode' => '1', 'state' => 'success'], 200);
    }
}
