<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BalancePaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveBalancePaymentRequest;

class BalancePayment extends PaymentResource
{
    private $token;
    private $callbackUrl;

    public static function retrieve(RetrieveBalancePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/auth/ecom/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BalancePaymentMapper::create($rawResult)->jsonDecode()->mapBalancePayment(new BalancePayment());
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