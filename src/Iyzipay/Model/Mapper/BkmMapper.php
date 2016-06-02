<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Bkm;

class BkmMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BkmMapper($rawResult);
    }

    public function mapBkmFrom(Bkm $auth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($auth, $jsonObject);

        if (isset($jsonObject->token)) {
            $auth->setToken($jsonObject->token);
        }
        if (isset($jsonObject->callbackUrl)) {
            $auth->setCallbackUrl($jsonObject->callbackUrl);
        }
        return $auth;
    }

    public function mapBkm(Bkm $auth)
    {
        return $this->mapBkmFrom($auth, $this->jsonObject);
    }
}