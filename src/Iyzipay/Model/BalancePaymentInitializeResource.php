<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class BalancePaymentInitializeResource extends IyzipayResource
{
    private $token;
    private $checkoutFormContent;
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

    public function getCheckoutFormContent()
    {
        return $this->checkoutFormContent;
    }

    public function setCheckoutFormContent($checkoutFormContent)
    {
        $this->checkoutFormContent = $checkoutFormContent;
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