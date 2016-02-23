<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new PaymentPreAuthMapper();
    }

    public function mapPaymentPreAuth(PaymentPreAuth $preAuth, $jsonResult)
    {
        parent::mapPayment($preAuth, $jsonResult);
        return $preAuth;
    }
}