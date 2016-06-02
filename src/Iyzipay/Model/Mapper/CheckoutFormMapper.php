<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutForm;

class CheckoutFormMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CheckoutFormMapper($rawResult);
    }

    public function mapCheckoutFormAuthFrom(CheckoutForm $auth, $jsonObject)
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

    public function mapCheckoutFormAuth(CheckoutForm $auth)
    {
        return $this->mapCheckoutFormAuthFrom($auth, $this->jsonObject);
    }
}