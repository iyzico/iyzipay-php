<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PayWithIyzicoMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrievePayWithIyzicoRequest;

class PayWithIyzico extends PaymentResource
{
    private $token;
    private $callbackUrl;
    private $paymentStatus;
    private $signature;

    public static function retrieve(RetrievePayWithIyzicoRequest $request, Options $options)
    {
        $uri = "/payment/iyzipos/checkoutform/auth/ecom/detail";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PayWithIyzicoMapper::create($rawResult)->jsonDecode()->mapPayWithIyzico(new PayWithIyzico());
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

    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}