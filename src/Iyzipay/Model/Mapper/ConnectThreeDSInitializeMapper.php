<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSInitialize;

class ConnectThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectThreeDSInitializeMapper();
    }

    public function map(ConnectThreeDSInitialize $initialize, $jsonResult)
    {
        parent::map($initialize, $jsonResult);

        if(isset($jsonResult->htmlContent)) {
            $initialize->setHtmlContent($jsonResult->htmlContent);
        }
        return $initialize;
    }
}