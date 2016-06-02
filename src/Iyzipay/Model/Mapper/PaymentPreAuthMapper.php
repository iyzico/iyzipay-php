<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentPreAuthMapper($rawResult);
    }

    public function mapPaymentPreAuthFrom(PaymentPreAuth $preAuth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($preAuth, $jsonObject);
        return $preAuth;
    }

    public function mapPaymentPreAuth(PaymentPreAuth $preAuth)
    {
        return $this->mapPaymentPreAuthFrom($preAuth, $this->jsonObject);
    }
}