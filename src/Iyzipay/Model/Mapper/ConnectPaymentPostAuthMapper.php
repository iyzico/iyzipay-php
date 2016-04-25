<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPostAuth;

class ConnectPaymentPostAuthMapper extends ConnectPaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectPaymentPostAuthMapper($rawResult);
    }

    public function mapConnectPaymentPostAuthFrom(ConnectPaymentPostAuth $postAuth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($postAuth, $jsonObject);
        return $postAuth;
    }

    public function mapConnectPaymentPostAuth(ConnectPaymentPostAuth $postAuth)
    {
        return $this->mapConnectPaymentPostAuthFrom($postAuth, $this->jsonObject);
    }
}