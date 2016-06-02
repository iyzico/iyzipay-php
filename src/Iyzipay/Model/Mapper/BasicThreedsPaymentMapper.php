<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicThreedsPayment;

class BasicThreedsPaymentMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicThreedsPaymentMapper($rawResult);
    }

    public function mapConnectThreeDSAuthFrom(BasicThreedsPayment $auth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapConnectThreeDSAuth(BasicThreedsPayment $auth)
    {
        return $this->mapConnectThreeDSAuthFrom($auth, $this->jsonObject);
    }
}