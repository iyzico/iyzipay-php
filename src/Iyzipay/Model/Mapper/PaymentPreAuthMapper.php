<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPreAuth;

class PaymentPreAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new PaymentPreAuthMapper();
    }

    public function map(PaymentPreAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);

        return $auth;
    }
}