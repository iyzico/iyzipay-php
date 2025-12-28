<?php

namespace Iyzipay;

class IyziAuthV2Generator
{
    public static function generateAuthContent($uri, $apiKey, $secretKey, $randomString, Request $request = null)
    {
        $hashStr = "apiKey:" . $apiKey . "&randomKey:" . $randomString ."&signature:" . self::getHmacSHA256Signature($uri, $secretKey, $randomString, $request);
        return base64_encode($hashStr);
    }

    public static function getHmacSHA256Signature($uri, $secretKey, $randomString, Request $request = null)
    {
        $dataToEncrypt = $randomString . self::getPayload($uri, $request);

        $hash = hash_hmac('sha256', $dataToEncrypt, $secretKey, true);
        return bin2hex($hash);
    }

    public static function getPayload($uri, Request $request = null)
    {
        $uriPath = $uri;
        $startsWithV2 = strpos($uri, '.com/v2');
        $startNumber  = strpos($uri, '/v2');
        $endNumber    = strpos($uri, '?');

        if ($startNumber !== false && $startsWithV2) {
            if (strpos($uri, "subscription") !== false || strpos($uri, "ucs") !== false) {
                $endNumber = strlen($uri);
                if (strpos($uri, '?') !== false) {
                    $endNumber = strpos($uri, '?');
                }
            }
            $endNumber -= $startNumber;
            $uriPath =  substr($uri, $startNumber, $endNumber);
        }

        if (!empty($request) && $request->toJsonString() != '[]')
            $uriPath = $uriPath.$request->toJsonString();

        return $uriPath;
    }
}