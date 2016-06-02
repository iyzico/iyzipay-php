<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BkmInitialize;

class BkmInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BkmInitializeMapper($rawResult);
    }

    public function mapBKMInitializeFrom(BkmInitialize $initialize, $jsonObject)
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

    public function mapBKMInitialize(BkmInitialize $initialize)
    {
        return $this->mapBKMInitializeFrom($initialize, $this->jsonObject);
    }
}