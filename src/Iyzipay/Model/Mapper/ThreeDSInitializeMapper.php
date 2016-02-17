<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ThreeDSInitialize;

class ThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ThreeDSInitializeMapper();
    }

    public function map(ThreeDSInitialize $initialize, $jsonResult)
    {
        parent::map($initialize, $jsonResult);
        if (isset($jsonResult->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->threeDSHtmlContent));
        }
        return $initialize;
    }
}