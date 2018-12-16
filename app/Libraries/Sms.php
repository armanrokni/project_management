<?php

namespace App\Libraries;

class Sms{
    public function __construct($phone, $message){
        $data = [
            'from' => '5000145',
            'to' => json_encode([$phone]),
            'message' => $message,
            'uname' => 'dEpkaRb',
            'pass' => 'SEF#$wsd@@',
            'op' => 'send'
        ];
        return $this->Curl('37.130.202.188/services.jspd', $data);
    }

    public function Curl($url, $data){
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];
        return $res_data;
    }
}
