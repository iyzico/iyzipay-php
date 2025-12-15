<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsV2Payment;

class ThreedsV2PaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsV2PaymentMapper($rawResult);
    }

    public function mapThreedsV2PaymentFrom(ThreedsV2Payment $auth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapThreedsV2Payment(ThreedsV2Payment $auth)
    {
        return $this->mapThreedsV2PaymentFrom($auth, $this->jsonObject);
    }
}