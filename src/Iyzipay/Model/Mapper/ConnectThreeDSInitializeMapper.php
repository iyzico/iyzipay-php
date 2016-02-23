<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSInitialize;

class ConnectThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectThreeDSInitializeMapper();
    }

    public function mapConnectThreeDSInitialize(ConnectThreeDSInitialize $initialize, $jsonResult)
    {
        parent::mapResource($initialize, $jsonResult);

        if (isset($jsonResult->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonResult->threeDSHtmlContent));
        }
        return $initialize;
    }
}