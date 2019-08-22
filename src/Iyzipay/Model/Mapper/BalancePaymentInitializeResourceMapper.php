<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BalancePaymentInitializeResource;

class BalancePaymentInitializeResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BalancePaymentInitializeMapper($rawResult);
    }

    public function mapBalancePaymentInitializeResourceFrom(BalancePaymentInitializeResource $initialize, $jsonObject)
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

    public function mapBalancePaymentInitializeResource(BalancePaymentInitializeResource $initialize)
    {
        return $this->mapBalancePaymentInitializeResourceFrom($initialize, $this->jsonObject);
    }
}