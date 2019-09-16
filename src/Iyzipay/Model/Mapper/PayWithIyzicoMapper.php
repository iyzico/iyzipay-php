<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayWithIyzico;

class PayWithIyzicoMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayWithIyzicoMapper($rawResult);
    }

    public function mapPayWithIyzicoFrom(PayWithIyzico $auth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($auth, $jsonObject);

        if (isset($jsonObject->token)) {
            $auth->setToken($jsonObject->token);
        }
        if (isset($jsonObject->callbackUrl)) {
            $auth->setCallbackUrl($jsonObject->callbackUrl);
        }
        return $auth;
    }

    public function mapPayWithIyzico(PayWithIyzico $auth)
    {
        return $this->mapPayWithIyzicoFrom($auth, $this->jsonObject);
    }
}