<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicBkmMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveBkmRequest;

class BasicBkm extends BasicPaymentResource
{
    private $token;
    private $callbackUrl;
    private $paymentStatus;

    public static function retrieve(RetrieveBkmRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/bkm/auth/detail/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicBkmMapper::create($rawResult)->jsonDecode()->mapBasicBkm(new BasicBkm());
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

    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }
}