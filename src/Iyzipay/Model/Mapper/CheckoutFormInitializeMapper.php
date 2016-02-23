<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitialize;

class CheckoutFormInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CheckoutFormInitializeMapper();
    }

    public function mapCheckoutFormInitialize(CheckoutFormInitialize $initialize, $jsonResult)
    {
        parent::mapResource($initialize, $jsonResult);

        if (isset($jsonResult->token)) {
            $initialize->setToken($jsonResult->token);
        }
        if (isset($jsonResult->checkoutFormContent)) {
            $initialize->setCheckoutFormContent($jsonResult->checkoutFormContent);
        }
        if (isset($jsonResult->tokenExpireTime)) {
            $initialize->setTokenExpireTime($jsonResult->tokenExpireTime);
        }
        if (isset($jsonResult->paymentPageUrl)) {
            $initialize->setPaymentPageUrl($jsonResult->paymentPageUrl);
        }
        return $initialize;
    }
}