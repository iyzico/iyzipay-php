<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsInitializePreAuth;

class ThreedsInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsInitializePreAuthMapper($rawResult);
    }

    public function mapThreeDSInitializePreAuthFrom(ThreedsInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initializePreAuth;
    }

    public function mapThreeDSInitializePreAuth(ThreedsInitializePreAuth $initializePreAuth)
    {
        return $this->mapThreeDSInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}
