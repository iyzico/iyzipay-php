<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionCreateCheckoutFormMapper;
use Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest;


class SubscriptionCreateCheckoutForm extends IyzipayResource
{
    private $token;
    private $checkoutFormContent;
    private $tokenExpireTime;

    public static function create(SubscriptionCreateCheckoutFormRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/checkoutform/initialize";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionCreateCheckoutFormMapper::create($rawResult)->jsonDecode()->mapSubscriptionCreateCheckoutForm(new SubscriptionCreateCheckoutForm());
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
}
