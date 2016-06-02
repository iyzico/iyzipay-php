<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitializePreAuth;

class BasicThreedsInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicThreedsInitializePreAuthMapper($rawResult);
    }

    public function mapConnectThreeDSInitializePreAuthFrom(BasicThreedsInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initializePreAuth;
    }

    public function mapConnectThreeDSInitializePreAuth(BasicThreedsInitializePreAuth $initializePreAuth)
    {
        return $this->mapConnectThreeDSInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}