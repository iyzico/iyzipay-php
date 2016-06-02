<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsPayment;

class ThreedsPaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsPaymentMapper($rawResult);
    }

    public function mapThreeDSAuthFrom(ThreedsPayment $auth, $jsonObject)
    {
        parent::mapPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapThreeDSAuth(ThreedsPayment $auth)
    {
        return $this->mapThreeDSAuthFrom($auth, $this->jsonObject);
    }
}