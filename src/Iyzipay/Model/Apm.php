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
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/apm/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ApmMapper::create($rawResult)->jsonDecode()->mapApm(new Apm());
    }

    public static function retrieve(RetrieveApmRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/apm/retrieve", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ApmMapper::create($rawResult)->jsonDecode()->mapApm(new Apm());
    }
}