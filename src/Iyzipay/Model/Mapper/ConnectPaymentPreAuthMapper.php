<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPreAuth;

class ConnectPaymentPreAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentPreAuthMapper();
    }

    public function map(ConnectPaymentPreAuth $preAuth, $jsonResult)
    {
        parent::map($preAuth, $jsonResult);
        return $preAuth;
    }
}