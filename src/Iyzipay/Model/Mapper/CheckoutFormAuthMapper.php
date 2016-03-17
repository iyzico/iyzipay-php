<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormAuth;

class CheckoutFormAuthMapper extends PaymentMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormAuthMapper($rawResult);
    }

    public function mapCheckoutFormAuthFrom(CheckoutFormAuth $auth, $jsonObject)
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

    public function mapCheckoutFormAuth(CheckoutFormAuth $auth)
    {
        return $this->mapCheckoutFormAuthFrom($auth, $this->jsonObject);
    }
}