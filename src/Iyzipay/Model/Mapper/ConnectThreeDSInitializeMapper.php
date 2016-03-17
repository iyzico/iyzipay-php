<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSInitialize;

class ConnectThreeDSInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectThreeDSInitializeMapper($rawResult);
    }

    public function mapConnectThreeDSInitializeFrom(ConnectThreeDSInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->threeDSHtmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->threeDSHtmlContent));
        }
        return $initialize;
    }

    public function mapConnectThreeDSInitialize(ConnectThreeDSInitialize $initialize)
    {
        return $this->mapConnectThreeDSInitializeFrom($initialize, $this->jsonObject);
    }
}