<?php

namespace Iyzipay;

class ApiResource
{
    private static $httpClient;
    private $rawResult;

    public static function httpClient()
    {
        if (!self::$httpClient) {
            self::$httpClient = DefaultHttpClient::create();
        }
        return self::$httpClient;
    }

    public static function setHttpClient($httpClient)
    {
        self::$httpClient = $httpClient;
    }

    public function getRawResult()
    {
        return $this->rawResult;
    }

    public function setRawResult($rawResult)
    {
        $this->rawResult = $rawResult;
    }
}