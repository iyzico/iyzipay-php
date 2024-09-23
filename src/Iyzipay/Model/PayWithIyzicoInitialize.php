<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PayWithIyzicoInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePayWithIyzicoInitializeRequest;

class PayWithIyzicoInitialize extends PayWithIyzicoInitializeResource
{
    public static function create(CreatePayWithIyzicoInitializeRequest $request, Options $options)
    {
        $uri = "/payment/pay-with-iyzico/initialize";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PayWithIyzicoInitializeMapper::create($rawResult)->jsonDecode()->mapPayWithIyzicoInitialize(new PayWithIyzicoInitialize());

    }
}