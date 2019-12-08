<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionActionMapper;
use Iyzipay\Request\Subscription\SubscriptionUpgradeRequest;
use Iyzipay\Options;

class SubscriptionUpgrade extends IyzipayResource
{
    public static function update(SubscriptionUpgradeRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/subscriptions/" . $request->getSubscriptionReferenceCode() . "/upgrade";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionActionMapper::create($rawResult)->jsonDecode()->mapSubscriptionAction(new SubscriptionUpgrade());
    }

}