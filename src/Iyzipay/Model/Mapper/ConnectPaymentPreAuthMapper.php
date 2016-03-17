<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPreAuth;

class ConnectPaymentPreAuthMapper extends ConnectPaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectPaymentPreAuthMapper($rawResult);
    }

    public function mapConnectPaymentPreAuthFrom(ConnectPaymentPreAuth $preAuth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($preAuth, $jsonObject);
        return $preAuth;
    }

    public function mapConnectPaymentPreAuth(ConnectPaymentPreAuth $preAuth)
    {
        return $this->mapConnectPaymentPreAuthFrom($preAuth, $this->jsonObject);
    }
}