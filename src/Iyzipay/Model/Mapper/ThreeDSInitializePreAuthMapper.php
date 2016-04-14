<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSInitializePreAuth;

class ThreeDSInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreeDSInitializePreAuthMapper($rawResult);
    }

    public function mapThreeDSInitializePreAuthFrom(ThreeDSInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initializePreAuth;
    }

    public function mapThreeDSInitializePreAuth(ThreeDSInitializePreAuth $initializePreAuth)
    {
        return $this->mapThreeDSInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}