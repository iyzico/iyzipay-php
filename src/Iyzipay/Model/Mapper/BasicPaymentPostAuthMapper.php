<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicPaymentPostAuth;

class BasicPaymentPostAuthMapper extends BasicPaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicPaymentPostAuthMapper($rawResult);
    }

    public function mapConnectPaymentPostAuthFrom(BasicPaymentPostAuth $postAuth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($postAuth, $jsonObject);
        return $postAuth;
    }

    public function mapConnectPaymentPostAuth(BasicPaymentPostAuth $postAuth)
    {
        return $this->mapConnectPaymentPostAuthFrom($postAuth, $this->jsonObject);
    }
}