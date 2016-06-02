<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Payment;

class PaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentMapper($rawResult);
    }

    public function mapPaymentResourceFrom(Payment $auth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapPaymentResource(Payment $auth)
    {
        return $this->mapPaymentResourceFrom($auth, $this->jsonObject);
    }
}