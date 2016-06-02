<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Bkm;

class BkmMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BkmMapper($rawResult);
    }

    public function mapBKMAuthFrom(Bkm $auth, $jsonObject)
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

    public function mapBKMAuth(Bkm $auth)
    {
        return $this->mapBKMAuthFrom($auth, $this->jsonObject);
    }
}