<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PayWithIyzicoInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePayWithIyzicoInitializeRequest;

class PayWithIyzicoInitialize extends PayWithIyzicoInitializeResource
{
    public static function create(CreatePayWithIyzicoInitializeRequest $request, Options $options)
    {

        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/pay-with-iyzico/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PayWithIyzicoInitializeMapper::create($rawResult)->jsonDecode()->mapPayWithIyzicoInitialize(new PayWithIyzicoInitialize());

    }
}