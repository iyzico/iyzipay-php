<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMInitialize;

class BKMInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BKMInitializeMapper();
    }

    public function mapBKMInitialize(BKMInitialize $initialize, $jsonResult)
    {
        parent::mapResource($initialize, $jsonResult);

        if (isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->htmlContent));
        }
        return $initialize;
    }
}