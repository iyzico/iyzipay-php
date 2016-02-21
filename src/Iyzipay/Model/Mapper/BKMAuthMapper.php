<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMAuth;

class BKMAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new BKMAuthMapper();
    }

    public function map(BKMAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);

        if (isset($jsonResult->token)) {
            $auth->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $auth->setCallbackUrl($jsonResult->callbackUrl);
        }
        return $auth;
    }
}