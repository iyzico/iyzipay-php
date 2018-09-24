<?php

namespace Iyzipay;

class IyziAuthV2Generator
{
    public static function generateAuthContent($uri, $apiKey, $secretKey, $randomString, Request $request = null)
    {
        $hashStr = "apiKey:" . $apiKey . "&randomKey:" . $randomString ."&signature:" . self::getHmacSHA256Signature($uri, $secretKey, $randomString, $request);

        $hashStr = base64_encode($hashStr);

        return $hashStr;
    }

    public static function getHmacSHA256Signature($uri, $secretKey, $randomString, Request $request = null)
    {
        $dataToEncrypt = $randomString . self::getPayload($uri, $request);

        $hash = hash_hmac('sha256', $dataToEncrypt, $secretKey, true);
        $token = bin2hex($hash);

        return $token;
    }

    public static function getPayload($uri, Request $request = null)
    {

        $startNumber  = strpos($uri, '/v2');
        $endNumber    = strpos($uri, '?');
        $endNumber-=  $startNumber;

        $uriPath      =  substr($uri, $startNumber, $endNumber);

        if (!empty($request) && $request->toJsonString() != '[]')
            $uriPath = $uriPath.$request->toJsonString();

        return $uriPath;
    }
}