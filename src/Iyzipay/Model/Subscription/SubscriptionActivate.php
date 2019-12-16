<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionActionMapper;
use Iyzipay\Request\Subscription\SubscriptionActivateRequest;
use Iyzipay\Options;

class SubscriptionActivate extends IyzipayResource
{
    public static function update(SubscriptionActivateRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/subscriptions/" .  $request->getSubscriptionReferenceCode()."/activate";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionActionMapper::create($rawResult)->jsonDecode()->mapSubscriptionAction(new SubscriptionActivate());
    }

}