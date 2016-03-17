<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPostAuth;

class ConnectPaymentPostAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectPaymentPostAuthMapper($rawResult);
    }

    public function mapConnectPaymentPostAuthFrom(ConnectPaymentPostAuth $postAuth, $jsonObject)
    {
        parent::mapResourceFrom($postAuth, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $postAuth->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->price)) {
            $postAuth->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->connectorName)) {
            $postAuth->setConnectorName($jsonObject->connectorName);
        }
        return $postAuth;
    }

    public function mapConnectPaymentPostAuth(ConnectPaymentPostAuth $postAuth)
    {
        return $this->mapConnectPaymentPostAuthFrom($postAuth, $this->jsonObject);
    }
}