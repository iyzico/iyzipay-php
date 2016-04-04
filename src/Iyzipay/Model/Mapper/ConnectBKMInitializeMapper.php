<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectBKMInitialize;

class ConnectBKMInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectBKMInitializeMapper($rawResult);
    }

    public function mapConnectBKMInitializeFrom(ConnectBKMInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->htmlContent)) {
            $initialize->setHtmlContent(base64_decode($jsonObject->htmlContent));
        }
        if (isset($jsonObject->token)) {
            $initialize->setToken($jsonObject->token);
        }
        return $initialize;
    }

    public function mapConnectBKMInitialize(ConnectBKMInitialize $initialize)
    {
        return $this->mapConnectBKMInitializeFrom($initialize, $this->jsonObject);
    }
}