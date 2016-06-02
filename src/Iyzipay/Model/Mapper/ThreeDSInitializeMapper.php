<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreedsInitialize;

class ThreedsInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreedsInitializeMapper($rawResult);
    }

    public function mapThreeDSInitializeFrom(ThreedsInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initialize;
    }

    public function mapThreeDSInitialize(ThreedsInitialize $initialize)
    {
        return $this->mapThreeDSInitializeFrom($initialize, $this->jsonObject);
    }
}