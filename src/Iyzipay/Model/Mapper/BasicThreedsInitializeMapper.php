<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitialize;

class BasicThreedsInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicThreedsInitializeMapper($rawResult);
    }

    public function mapConnectThreeDSInitializeFrom(BasicThreedsInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initialize;
    }

    public function mapConnectThreeDSInitialize(BasicThreedsInitialize $initialize)
    {
        return $this->mapConnectThreeDSInitializeFrom($initialize, $this->jsonObject);
    }
}