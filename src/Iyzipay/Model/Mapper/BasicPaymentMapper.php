<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicPayment;

class BasicPaymentMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicPaymentMapper($rawResult);
    }

    public function mapBasicPaymentFrom(BasicPayment $auth, $jsonObject)
    {
        parent::mapBasicPaymentResourceFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapBasicPayment(BasicPayment $auth)
    {
        return $this->mapBasicPaymentFrom($auth, $this->jsonObject);
    }
}