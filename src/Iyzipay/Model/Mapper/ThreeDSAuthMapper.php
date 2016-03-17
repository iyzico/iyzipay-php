<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSAuth;

class ThreeDSAuthMapper extends PaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ThreeDSAuthMapper($rawResult);
    }

    public function mapThreeDSAuthFrom(ThreeDSAuth $auth, $jsonObject)
    {
        parent::mapPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapThreeDSAuth(ThreeDSAuth $auth)
    {
        return $this->mapThreeDSAuthFrom($auth, $this->jsonObject);
    }
}