<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSInitializePreAuth;

class ConnectThreeDSInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectThreeDSInitializePreAuthMapper($rawResult);
    }

    public function mapConnectThreeDSInitializePreAuthFrom(ConnectThreeDSInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initializePreAuth;
    }

    public function mapConnectThreeDSInitializePreAuth(ConnectThreeDSInitializePreAuth $initializePreAuth)
    {
        return $this->mapConnectThreeDSInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}