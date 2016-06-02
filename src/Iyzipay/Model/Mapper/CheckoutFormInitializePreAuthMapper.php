<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitializePreAuth;

class CheckoutFormInitializePreAuthMapper extends CheckoutFormInitializeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormInitializePreAuthMapper($rawResult);
    }

    public function mapCheckoutFormInitializeFromPreAuth(CheckoutFormInitializePreAuth $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);
        return $initialize;
    }

    public function mapCheckoutFormInitializePreAuth(CheckoutFormInitializePreAuth $initialize)
    {
        return $this->mapCheckoutFormInitializeFromPreAuth($initialize, $this->jsonObject);
    }
}