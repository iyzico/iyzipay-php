<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsInitialize;

class ThreedsInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsInitializeMapper($rawResult);
    }

    public function mapThreedsInitializeFrom(ThreedsInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        if (isset($jsonObject->paymentId)) {
            $initialize->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->signature)) {
            $initialize->setSignature($jsonObject->signature);
        }
        return $initialize;
    }

    public function mapThreedsInitialize(ThreedsInitialize $initialize)
    {
        return $this->mapThreedsInitializeFrom($initialize, $this->jsonObject);
    }
}
