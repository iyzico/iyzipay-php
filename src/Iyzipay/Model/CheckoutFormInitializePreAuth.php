<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\CheckoutFormInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class CheckoutFormInitializePreAuth extends CheckoutFormInitializeResource
{
    public static function create(CreateCheckoutFormInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/initialize/preauth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CheckoutFormInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapCheckoutFormInitializePreAuth(new CheckoutFormInitializePreAuth());
    }
}