<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\CheckoutFormMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveCheckoutFormRequest;

class CheckoutForm extends PaymentResource
{
    private $token;
    private $callbackUrl;

    public static function retrieve(RetrieveCheckoutFormRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/auth/ecom/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CheckoutFormMapper::create($rawResult)->jsonDecode()->mapCheckoutForm(new CheckoutForm());
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