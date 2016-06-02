<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicPaymentPreAuth;

class BasicPaymentPreAuthMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicPaymentPreAuthMapper($rawResult);
    }

    public function mapConnectPaymentPreAuthFrom(BasicPaymentPreAuth $preAuth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($preAuth, $jsonObject);
        return $preAuth;
    }

    public function mapConnectPaymentPreAuth(BasicPaymentPreAuth $preAuth)
    {
        return $this->mapConnectPaymentPreAuthFrom($preAuth, $this->jsonObject);
    }
}