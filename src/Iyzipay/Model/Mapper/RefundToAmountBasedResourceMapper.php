<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\RefundToAmountBasedResource;

class RefundToAmountBasedResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundToAmountBasedResourceMapper($rawResult);
    }

    public function mapRefundToAmountBasedResourceFrom(RefundToAmountBasedResource $refundResource, $jsonObject)
    {
        parent::mapResourceFrom($refundResource, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $refundResource->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->price)) {
            $refundResource->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->locale)) {
            $refundResource->setLocale($jsonObject->locale);
        }
        if (isset($jsonObject->connectorName)) {
            $refundResource->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->authCode)) {
            $refundResource->setAuthCode($jsonObject->authCode);
        }
        return $refundResource;
    }

    public function mapRefundToAmountBasedResource(RefundToAmountBasedResource $refundResource)
    {
        return $this->mapRefundToAmountBasedResourceFrom($refundResource, $this->jsonObject);
    }
}