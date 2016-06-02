<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\CheckoutFormInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class CheckoutFormInitialize extends CheckoutFormInitializeResource
{
    public static function create(CreateCheckoutFormInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/initialize/auth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CheckoutFormInitializeMapper::create($rawResult)->jsonDecode()->mapCheckoutFormInitialize(new CheckoutFormInitialize());
    }
}