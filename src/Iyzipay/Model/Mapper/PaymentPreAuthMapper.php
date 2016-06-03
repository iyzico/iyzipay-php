<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentPreAuthMapper($rawResult);
    }

    public function mapPaymentPreAuthFrom(PaymentPreAuth $paymentPreAuth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($paymentPreAuth, $jsonObject);
        return $paymentPreAuth;
    }

    public function mapPaymentPreAuth(PaymentPreAuth $paymentPreAuth)
    {
        return $this->mapPaymentPreAuthFrom($paymentPreAuth, $this->jsonObject);
    }
}