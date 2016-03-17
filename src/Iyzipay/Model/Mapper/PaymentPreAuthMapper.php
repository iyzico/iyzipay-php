<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentPreAuthMapper($rawResult);
    }

    public function mapPaymentPreAuthFrom(PaymentPreAuth $preAuth, $jsonObject)
    {
        parent::mapPaymentFrom($preAuth, $jsonObject);
        return $preAuth;
    }

    public function mapPaymentPreAuth(PaymentPreAuth $preAuth)
    {
        return $this->mapPaymentPreAuthFrom($preAuth, $this->jsonObject);
    }
}