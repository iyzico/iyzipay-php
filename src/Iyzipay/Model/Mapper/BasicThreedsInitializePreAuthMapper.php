<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitializePreAuth;

class BasicThreedsInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicThreedsInitializePreAuthMapper($rawResult);
    }

    public function mapBasicThreedsInitializePreAuthFrom(BasicThreedsInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initializePreAuth;
    }

    public function mapBasicThreedsInitializePreAuth(BasicThreedsInitializePreAuth $initializePreAuth)
    {
        return $this->mapBasicThreedsInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}