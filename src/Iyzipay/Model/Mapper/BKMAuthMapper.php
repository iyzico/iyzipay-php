<?php

namespace Iyzipay\Model\Mapper;


use Iyzipay\Model\BKMAuth;

class BKMAuthMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BKMAuthMapper();
    }

    public function map(BKMAuth $BKMAuth, $jsonResult)
    {
        parent::map($BKMAuth, $jsonResult);

        if (isset($jsonResult->token)) {
            $BKMAuth->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $BKMAuth->setCallbackUrl($jsonResult->callbackUrl);
        }
        return $BKMAuth;
    }
}