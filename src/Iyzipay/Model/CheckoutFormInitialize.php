<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CheckoutFormInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class CheckoutFormInitialize extends IyzipayResource
{
    private $token;
    private $checkoutFormContent;
    private $tokenExpireTime;
    private $paymentPageUrl;

    public static function create(CreateCheckoutFormInitializeRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/initialize/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CheckoutFormInitializeMapper::create()->mapCheckoutFormInitialize(new CheckoutFormInitialize(), JsonBuilder::jsonDecode($rawResult));
    }

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