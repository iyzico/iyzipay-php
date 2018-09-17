<?php

namespace Iyzipay;

class HashGenerator
{
    public static function generateHash($apiKey, $secretKey, $randomString, Request $request)
    {
        $hashStr = $apiKey . $randomString . $secretKey . $request->toPKIRequestString();
        return base64_encode(sha1($hashStr, true));
    }
}