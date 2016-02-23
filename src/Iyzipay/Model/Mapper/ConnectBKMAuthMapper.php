<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectBKMAuth;

class ConnectBKMAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectBKMAuthMapper();
    }

    public function mapConnectBKMAuth(ConnectBKMAuth $auth, $jsonResult)
    {
        parent::mapConnectPayment($auth, $jsonResult);

        if (isset($jsonResult->token)) {
            $auth->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $auth->setCallbackUrl($jsonResult->callbackUrl);
        }
        if (isset($jsonResult->paymentStatus)) {
            $auth->setPaymentStatus($jsonResult->paymentStatus);
        }
        return $auth;
    }
}