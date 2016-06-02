<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitialize;

class BasicThreedsInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicThreedsInitializeMapper($rawResult);
    }

    public function mapBasicThreedsInitializeFrom(BasicThreedsInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initialize;
    }

    public function mapBasicThreedsInitialize(BasicThreedsInitialize $initialize)
    {
        return $this->mapBasicThreedsInitializeFrom($initialize, $this->jsonObject);
    }
}