<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Payment;

class PaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentMapper($rawResult);
    }

    public function mapPaymentAuthFrom(Payment $auth, $jsonObject)
    {
        parent::mapPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapPaymentAuth(Payment $auth)
    {
        return $this->mapPaymentAuthFrom($auth, $this->jsonObject);
    }
}