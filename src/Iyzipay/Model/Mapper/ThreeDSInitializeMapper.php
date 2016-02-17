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

        if(isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent($jsonResult->htmlContent);
        }
        return $initialize;
    }
}