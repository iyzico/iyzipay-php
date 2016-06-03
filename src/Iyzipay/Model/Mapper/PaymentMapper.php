<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Payment;

class PaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentMapper($rawResult);
    }

    public function mapPaymentFrom(Payment $payment, $jsonObject)
    {
        parent::mapPaymentResourceFrom($payment, $jsonObject);
        return $payment;
    }

    public function mapPayment(Payment $payment)
    {
        return $this->mapPaymentFrom($payment, $this->jsonObject);
    }
}