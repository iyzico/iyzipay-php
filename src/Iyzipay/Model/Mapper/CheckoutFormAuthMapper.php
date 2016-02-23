<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormAuth;

class CheckoutFormAuthMapper extends PaymentMapper
{
    public static function create()
    {
        return new CheckoutFormAuthMapper();
    }

    public function mapCheckoutFormAuth(CheckoutFormAuth $auth, $jsonResult)
    {
        parent::mapPayment($auth, $jsonResult);

        if (isset($jsonResult->token)) {
            $auth->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $auth->setCallbackUrl($jsonResult->callbackUrl);
        }
        return $auth;
    }
}