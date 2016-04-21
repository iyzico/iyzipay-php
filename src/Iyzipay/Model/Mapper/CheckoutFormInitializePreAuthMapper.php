<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitializePreAuth;

class CheckoutFormInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormInitializePreAuthMapper($rawResult);
    }

    public function mapCheckoutFormInitializeFromPreAuth(CheckoutFormInitializePreAuth $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->token)) {
            $initialize->setToken($jsonObject->token);
        }
        if (isset($jsonObject->checkoutFormContent)) {
            $initialize->setCheckoutFormContent($jsonObject->checkoutFormContent);
        }
        if (isset($jsonObject->tokenExpireTime)) {
            $initialize->setTokenExpireTime($jsonObject->tokenExpireTime);
        }
        if (isset($jsonObject->paymentPageUrl)) {
            $initialize->setPaymentPageUrl($jsonObject->paymentPageUrl);
        }
        return $initialize;
    }

    public function mapCheckoutFormInitializePreAuth(CheckoutFormInitializePreAuth $initialize)
    {
        return $this->mapCheckoutFormInitializeFromPreAuth($initialize, $this->jsonObject);
    }
}