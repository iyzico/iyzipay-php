<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentAuth;

class PaymentAuthMapper extends PaymentMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentAuthMapper($rawResult);
    }

    public function mapPaymentAuthFrom(PaymentAuth $auth, $jsonObject)
    {
        parent::mapPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapPaymentAuth(PaymentAuth $auth)
    {
        return $this->mapPaymentAuthFrom($auth, $this->jsonObject);
    }
}