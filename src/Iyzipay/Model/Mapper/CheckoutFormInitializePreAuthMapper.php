<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitializePreAuth;

class CheckoutFormInitializePreAuthMapper extends CheckoutFormInitializeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormInitializePreAuthMapper($rawResult);
    }

    public function mapCheckoutFormInitializePreAuthFrom(CheckoutFormInitializePreAuth $initialize, $jsonObject)
    {
        parent::mapCheckoutFormInitializeResourceFrom($initialize, $jsonObject);
        return $initialize;
    }

    public function mapCheckoutFormInitializePreAuth(CheckoutFormInitializePreAuth $initialize)
    {
        return $this->mapCheckoutFormInitializePreAuthFrom($initialize, $this->jsonObject);
    }
}