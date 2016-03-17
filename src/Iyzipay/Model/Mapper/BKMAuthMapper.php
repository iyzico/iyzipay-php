<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BKMAuth;

class BKMAuthMapper extends PaymentMapper
{
    public static function create($rawResult = null)
    {
        return new BKMAuthMapper($rawResult);
    }

    public function mapBKMAuthFrom(BKMAuth $auth, $jsonObject)
    {
        parent::mapPaymentFrom($auth, $jsonObject);

        if (isset($jsonObject->token)) {
            $auth->setToken($jsonObject->token);
        }
        if (isset($jsonObject->callbackUrl)) {
            $auth->setCallbackUrl($jsonObject->callbackUrl);
        }
        return $auth;
    }

    public function mapBKMAuth(BKMAuth $auth)
    {
        return $this->mapBKMAuthFrom($auth, $this->jsonObject);
    }
}