<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPostAuth;

class PaymentPostAuthMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PaymentPostAuthMapper();
    }

    public function map(PaymentPostAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);

        if(isset($jsonResult->paymentId)) {
            $auth->setPaymentId($jsonResult->paymentId);
        }
        if(isset($jsonResult->price)) {
            $auth->setPrice($jsonResult->price);
        }

        return $auth;
    }
}