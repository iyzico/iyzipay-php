<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Refund;

class RefundMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new RefundMapper();
    }

    public function map(Refund $refund, $jsonResult)
    {
        parent::map($refund, $jsonResult);

        if(isset($jsonResult->paymentId)) {
            $refund->setPaymentId($jsonResult->paymentId);
        }
        if(isset($jsonResult->paymentTransactionId)) {
            $refund->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        if(isset($jsonResult->price)) {
            $refund->setPrice($jsonResult->price);
        }
        return $refund;
    }
}