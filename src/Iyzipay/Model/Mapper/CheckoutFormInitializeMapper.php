<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitialize;

class CheckoutFormInitializeMapper extends CheckoutFormInitializeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormInitializeMapper($rawResult);
    }

    public function mapCheckoutFormInitializeFrom(CheckoutFormInitialize $initialize, $jsonObject)
    {
        parent::mapCheckoutFormInitializeResourceFrom($initialize, $jsonObject);
        return $initialize;
    }

    public function mapCheckoutFormInitialize(CheckoutFormInitialize $initialize)
    {
        return $this->mapCheckoutFormInitializeFrom($initialize, $this->jsonObject);
    }
}