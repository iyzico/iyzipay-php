<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicBkmInitialize;

class BasicBkmInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicBkmInitializeMapper($rawResult);
    }

    public function mapConnectBKMInitializeFrom(BasicBkmInitialize $initialize, $jsonObject)
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

    public function mapConnectBKMInitialize(BasicBkmInitialize $initialize)
    {
        return $this->mapConnectBKMInitializeFrom($initialize, $this->jsonObject);
    }
}