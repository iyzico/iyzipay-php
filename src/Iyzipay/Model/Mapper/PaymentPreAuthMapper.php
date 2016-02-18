<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new PaymentPreAuthMapper();
    }

    public function map(PaymentPreAuth $preAuth, $jsonResult)
    {
        parent::map($preAuth, $jsonResult);
        return $preAuth;
    }
}