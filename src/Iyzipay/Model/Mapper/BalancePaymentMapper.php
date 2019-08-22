<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BalancePayment;

class BalancePaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BalancePaymentMapper($rawResult);
    }

    public function mapBalancePaymentFrom(BalancePayment $auth, $jsonObject)
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

    public function mapBalancePayment(BalancePayment $auth)
    {
        return $this->mapBalancePaymentFrom($auth, $this->jsonObject);
    }
}