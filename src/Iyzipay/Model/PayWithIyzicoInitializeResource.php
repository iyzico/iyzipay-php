<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class PayWithIyzicoInitializeResource extends IyzipayResource
{
    private $token;
    private $payWithIyzicoContent;
    private $tokenExpireTime;
    private $paymentPageUrl;

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getPayWithIyzicoContent()
    {
        return $this->payWithIyzicoContent;
    }

    public function setPayWithIyzicoContent($payWithIyzicoContent)
    {
        $this->payWithIyzicoContent = $payWithIyzicoContent;
    }

    public function getTokenExpireTime()
    {
        return $this->tokenExpireTime;
    }

    public function setTokenExpireTime($tokenExpireTime)
    {
        $this->tokenExpireTime = $tokenExpireTime;
    }

    public function getPaymentPageUrl()
    {
        return $this->paymentPageUrl;
    }

    public function setPaymentPageUrl($paymentPageUrl)
    {
        $this->paymentPageUrl = $paymentPageUrl;
    }
}