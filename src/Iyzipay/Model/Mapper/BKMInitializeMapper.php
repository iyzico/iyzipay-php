<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMInitialize;

class BKMInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BKMInitializeMapper();
    }

    public function map(BKMInitialize $initialize, $jsonResult)
    {
        parent::map($initialize, $jsonResult);

        if (isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->htmlContent));
        }
        return $initialize;
    }
}