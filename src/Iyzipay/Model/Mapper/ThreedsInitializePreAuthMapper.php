<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsInitializePreAuth;

class ThreedsInitializePreAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsInitializePreAuthMapper($rawResult);
    }

    public function mapThreedsInitializePreAuthFrom(ThreedsInitializePreAuth $initializePreAuth, $jsonObject)
    {
        parent::mapResourceFrom($initializePreAuth, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initializePreAuth->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        if (isset($jsonObject->paymentId)) {
            $initializePreAuth->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->signature)) {
            $initializePreAuth->setSignature($jsonObject->signature);
        }
        return $initializePreAuth;
    }

    public function mapThreedsInitializePreAuth(ThreedsInitializePreAuth $initializePreAuth)
    {
        return $this->mapThreedsInitializePreAuthFrom($initializePreAuth, $this->jsonObject);
    }
}
