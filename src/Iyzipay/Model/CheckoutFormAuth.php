<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CheckoutFormAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveCheckoutFormAuthRequest;

class CheckoutFormAuth extends Payment
{
    private $token;
    private $callbackUrl;

    public static function retrieve(RetrieveCheckoutFormAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/auth/ecom/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CheckoutFormAuthMapper::create()->mapCheckoutFormAuth(new CheckoutFormAuth(), JsonBuilder::jsonDecode($rawResult));
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }
}