<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectBKMAuth;

class ConnectBKMAuthMapper
{
    public static function create()
    {
        return new ConnectBKMAuthMapper();
    }

    public function map(ConnectBKMAuth $initialize, $jsonResult)
    {
        if (isset($jsonResult->token)) {
            $initialize->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $initialize->setCallbackUrl($jsonResult->callbackUrl);
        }
        if (isset($jsonResult->paymentStatus)) {
            $initialize->setPaymentStatus($jsonResult->paymentStatus);
        }
        return $initialize;
    }
}