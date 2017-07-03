<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\RefundResource;

class RefundResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundResourceMapper($rawResult);
    }

    public function mapRefundResourceFrom(RefundResource $refundResource, $jsonObject)
    {
        parent::mapResourceFrom($refundResource, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $refundResource->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentTransactionId)) {
            $refundResource->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }
        if (isset($jsonObject->price)) {
            $refundResource->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->currency)) {
            $refundResource->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->connectorName)) {
            $refundResource->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->authCode)) {
            $refundResource->setAuthCode($jsonObject->authCode);
        }
        return $refundResource;
    }

    public function mapRefundResource(RefundResource $refundResource)
    {
        return $this->mapRefundResourceFrom($refundResource, $this->jsonObject);
    }
}