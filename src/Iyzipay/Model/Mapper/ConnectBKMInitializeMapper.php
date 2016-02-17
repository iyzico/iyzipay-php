<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectBKMInitialize;

class ConnectBKMInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectBKMInitializeMapper();
    }

    public function map(ConnectBKMInitialize $initialize, $jsonResult)
    {
        parent::map($initialize, $jsonResult);
        if (isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->htmlContent));
        }
        return $initialize;
    }
}