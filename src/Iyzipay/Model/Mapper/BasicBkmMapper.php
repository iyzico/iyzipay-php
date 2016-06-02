<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicBkm;

class BasicBkmMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicBkmMapper($rawResult);
    }

    public function mapConnectBKMAuthFrom(BasicBkm $auth, $jsonObject)
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

    public function mapConnectBKMAuth(BasicBkm $auth)
    {
        return $this->mapConnectBKMAuthFrom($auth, $this->jsonObject);
    }
}