<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPreAuth;

class ConnectPaymentPreAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentPreAuthMapper();
    }

    public function mapConnectPaymentPreAuth(ConnectPaymentPreAuth $preAuth, $jsonResult)
    {
        parent::mapConnectPayment($preAuth, $jsonResult);
        return $preAuth;
    }
}