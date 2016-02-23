<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSAuth;

class ThreeDSAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new ThreeDSAuthMapper();
    }

    public function mapThreeDSAuth(ThreeDSAuth $auth, $jsonResult)
    {
        parent::mapPayment($auth, $jsonResult);
        return $auth;
    }
}