<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSInitialize;

class ThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ThreeDSInitializeMapper();
    }

    public function mapThreeDSInitialize(ThreeDSInitialize $initialize, $jsonResult)
    {
        parent::mapResource($initialize, $jsonResult);

        if (isset($jsonResult->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->threeDSHtmlContent));
        }
        return $initialize;
    }
}