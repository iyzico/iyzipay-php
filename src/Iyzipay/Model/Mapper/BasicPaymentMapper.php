<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicPayment;

class BasicPaymentMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicPaymentMapper($rawResult);
    }

    public function mapConnectPaymentAuthFrom(BasicPayment $auth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapConnectPaymentAuth(BasicPayment $auth)
    {
        return $this->mapConnectPaymentAuthFrom($auth, $this->jsonObject);
    }
}