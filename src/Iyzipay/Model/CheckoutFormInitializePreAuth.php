<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\CheckoutFormInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class CheckoutFormInitializePreAuth extends CheckoutFormInitializeResource
{
    public static function create(CreateCheckoutFormInitializeRequest $request, Options $options)
    {
        $uri = "/payment/iyzipos/checkoutform/initialize/preauth/ecom";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return CheckoutFormInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapCheckoutFormInitializePreAuth(new CheckoutFormInitializePreAuth());
    }
}