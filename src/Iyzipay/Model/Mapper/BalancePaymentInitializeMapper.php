<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BalancePaymentInitialize;

class BalancePaymentInitializeMapper extends BalancePaymentInitializeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BalancePaymentInitializeMapper($rawResult);
    }

    public function mapBalancePaymentInitializeFrom(BalancePaymentInitialize $initialize, $jsonObject)
    {
        parent::mapBalancePaymentInitializeResourceFrom($initialize, $jsonObject);
        return $initialize;
    }

    public function mapBalancePaymentInitialize(BalancePaymentInitialize $initialize)
    {
        return $this->mapBalancePaymentInitializeFrom($initialize, $this->jsonObject);
    }
}