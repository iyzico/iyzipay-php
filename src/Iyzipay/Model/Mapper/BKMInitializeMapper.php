<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMInitialize;

class BKMInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BKMInitializeMapper($rawResult);
    }

    public function mapBKMInitializeFrom(BKMInitialize $initialize, $jsonObject)
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

    public function mapBKMInitialize(BKMInitialize $initialize)
    {
        return $this->mapBKMInitializeFrom($initialize, $this->jsonObject);
    }
}