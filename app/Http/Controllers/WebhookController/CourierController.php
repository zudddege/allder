<?php

namespace App\Http\Controllers\WebhookController;

use App\Http\Controllers\Controller;
use App\Models\Courier\Courier;
use App\Models\FlashCategoryCode\FlashCategoryCode;
use Illuminate\Http\Request;

class CourierController extends Controller {
    public function webhookCourierRequest(Request $request) {
        $courier = Courier::orderBy('id', 'desc')->where('pickup_id', $request->data['ticketPickupId'])->with(['user'])->first();
        $courier->update([
            'parcel_quantity' => $request->data['estimateParcelNumber'],
            'status_code' => $request->data['state'],
            'status_text' => FlashCategoryCode::courier($request->data['state']),
            'note_detail' => $request->data['remark'],
            'operator_id' => $request->data['staffInfoId'],
            'operator_name' => $request->data['staffInfoName'],
            'operator_tel' => $request->data['staffInfoPhone'],
            'operation_branch' => $request->data['storeName'],
            'cancel_operator' => $request->data['cancelOperatorId'] == 'AA0594' ? $courier->user->close_id : $request->data['cancelOperatorId'],
            'cancel_reason' => FlashCategoryCode::cancel($request->data['cancelReasonText']),
        ]);
        return response()->json(['errorCode' => '1', 'state' => 'success'], 200);
    }
}
