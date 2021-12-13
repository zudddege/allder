<?php

namespace App\Models\FlashCoreFunction;

use Illuminate\Database\Eloquent\Model;

class FlashCoreFunction extends Model {
    //

    public static function signParam($str) {
        return strtoupper(hash("sha256", $str));
    }

    public static function buildRequestParam($data_arr) {
        // $data_arr = [
        //     "mchId" => "AA0610",
        //     "nonceStr" => time()
        // ];
        $sign = '';
        ksort($data_arr);
        foreach ($data_arr as $k => $v) {
            if ((($v != null) || $v === 0) && ($k != 'sign')) {
                $sign .= $k . '=' . $v . '&';
            } else {
                unset($data_arr[$k]);
            }
        }
        $sign .= "key=" . "d50185f8cc11882a61b286ce622db9e1c2b33a57fed365f1539ff70f71bb33bc";

        $data_arr['sign'] = self::signParam($sign);

        $requestStr = '';
        foreach ($data_arr as $k => $v) {
            $requestStr .= $k . "=" . urlencode($v) . '&';
        }

        return substr($requestStr, 0, -1);
    }

    public static function postRequest($url, $postData) {

        // $postData = self::buildRequestParam();
        $curl = curl_init();
        $header[] = "Content-type: application/x-www-form-urlencoded";
        $header[] = "Accept: application/json";
        $header[] = "Accept-Language: th";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $responseText = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Errno' . curl_error($curl);
        }
        curl_close($curl);

        return $responseText;
    }

}
