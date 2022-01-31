<?php

namespace App\Http\Middleware;

use Closure;

class WebhookRequest {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static function signParam($str) {
        return strtoupper(hash("sha256", $str));
    }

    public static function webhookRequestVerify($request) {
        $sign = '';
        $offset = 60;
        $requestTime = intval($request->nonceStr / 1000) + $offset;
        $serverTime = intval(microtime(true));
        $timeout = 30;
        if ($serverTime - $requestTime <= $timeout) {
            $data_arr = [
                'mchId' => 'AA0594',
                'nonceStr' => $request->nonceStr,
            ];

            ksort($data_arr);
            foreach ($data_arr as $key => $value) {
                if ((($value != null) || $value === 0) && ($key != 'sign')) {
                    $sign .= $key . '=' . $value . '&';
                } else {
                    unset($data_arr[$key]);
                }
            }
            $sign .= "key=" . "d50185f8cc11882a61b286ce622db9e1c2b33a57fed365f1539ff70f71bb33bc";
            $sign = self::signParam($sign);
        }
        return $sign === $request->sign;
    }

    public function handle($request, Closure $next) {
        if (self::webhookRequestVerify($request)) {
            return $next($request);
        }
        return response()->json(['errorCode' => '0'], 403);
    }
}
