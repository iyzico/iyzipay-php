<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ApmMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateApmInitializeRequest;
use Iyzipay\Request\RetrieveApmRequest;

class Apm extends ApmResource
{
    public static function create(CreateApmInitializeRequest $request, Options $options)
    {
        $uri = "/payment/apm/initialize";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ApmMapper::create($rawResult)->jsonDecode()->mapApm(new Apm());
    }

    public static function retrieve(RetrieveApmRequest $request, Options $options)
    {
        $uri = "/payment/apm/retrieve";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ApmMapper::create($rawResult)->jsonDecode()->mapApm(new Apm());
    }
}