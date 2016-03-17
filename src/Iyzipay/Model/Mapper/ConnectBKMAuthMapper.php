<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectBKMAuth;

class ConnectBKMAuthMapper extends ConnectPaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectBKMAuthMapper($rawResult);
    }

    public function mapConnectBKMAuthFrom(ConnectBKMAuth $auth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($auth, $jsonObject);

        if (isset($jsonObject->token)) {
            $auth->setToken($jsonObject->token);
        }
        if (isset($jsonObject->callbackUrl)) {
            $auth->setCallbackUrl($jsonObject->callbackUrl);
        }
        if (isset($jsonObject->paymentStatus)) {
            $auth->setPaymentStatus($jsonObject->paymentStatus);
        }
        return $auth;
    }

    public function mapConnectBKMAuth(ConnectBKMAuth $auth)
    {
        return $this->mapConnectBKMAuthFrom($auth, $this->jsonObject);
    }
}