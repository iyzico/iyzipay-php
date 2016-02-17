<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMInitialize;

class BKMInitializeMapper
{
    public static function create()
    {
        return new BKMInitializeMapper();
    }

    public function map(BKMInitialize $initialize, $jsonResult)
    {
        if (isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent($jsonResult->htmlContent);
        }
        return $initialize;
    }
}