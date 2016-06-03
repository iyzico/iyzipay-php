<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\RefundChargedFromMerchant;

class RefundChargedFromMerchantMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundChargedFromMerchantMapper($rawResult);
    }

    public function mapRefundChargedFromMerchantFrom(RefundChargedFromMerchant $refund, $jsonObject)
    {
        parent::mapResourceFrom($refund, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $refund->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentTransactionId)) {
            $refund->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }
        if (isset($jsonObject->price)) {
            $refund->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->currency)) {
            $refund->setCurrency($jsonObject->currency);
        }
        return $refund;
    }

    public function mapRefundChargedFromMerchant(RefundChargedFromMerchant $refund)
    {
        return $this->mapRefundChargedFromMerchantFrom($refund, $this->jsonObject);
    }
}