<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSAuth;

class ThreeDSAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new ThreeDSAuthMapper();
    }

    public function map(ThreeDSAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);

        return $auth;
    }
}