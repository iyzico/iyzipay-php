<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentAuth;

class PaymentAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new PaymentAuthMapper();
    }

    public function map(PaymentAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);

        return $auth;
    }
}