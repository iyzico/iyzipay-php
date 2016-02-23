<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentAuth;

class PaymentAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new PaymentAuthMapper();
    }

    public function mapPaymentAuth(PaymentAuth $auth, $jsonResult)
    {
        parent::mapPayment($auth, $jsonResult);
        return $auth;
    }
}