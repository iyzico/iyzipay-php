<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class PayWithIyzicoInitializeResource extends IyzipayResource
{
    private $token;
    private $payWithIyzicoContent;
    private $tokenExpireTime;
    private $payWithIyzicoPageUrl;

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

    public function getPayWithIyzicoPageUrl()
    {
        return $this->payWithIyzicoPageUrl;
    }

    public function setPaymentPageUrl($payWithIyzicoPageUrl)
    {
        $this->payWithIyzicoPageUrl = $payWithIyzicoPageUrl;
    }
}