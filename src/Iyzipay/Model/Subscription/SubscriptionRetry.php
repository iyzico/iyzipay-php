<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionActionMapper;
use Iyzipay\Request\Subscription\SubscriptionRetryRequest;
use Iyzipay\Options;

class SubscriptionRetry extends IyzipayResource
{
    public static function update(SubscriptionRetryRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/operation/retry";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionActionMapper::create($rawResult)->jsonDecode()->mapSubscriptionAction(new SubscriptionRetry());
    }
}