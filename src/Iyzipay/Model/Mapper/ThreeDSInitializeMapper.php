<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSInitialize;

class ThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ThreeDSInitializeMapper($rawResult);
    }

    public function mapThreeDSInitializeFrom(ThreeDSInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initialize;
    }

    public function mapThreeDSInitialize(ThreeDSInitialize $initialize)
    {
        return $this->mapThreeDSInitializeFrom($initialize, $this->jsonObject);
    }
}