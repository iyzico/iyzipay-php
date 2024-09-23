<?php

namespace Iyzipay;

class HashGenerator
{
    public static function generateHash($apiKey, $secretKey, $randomString, $request)
    {
        $pKIRequestString = $request ? $request->toPKIRequestString() : '';
        $hashStr = $apiKey . $randomString . $secretKey . $pKIRequestString;
        return base64_encode(sha1($hashStr, true));
    }
}