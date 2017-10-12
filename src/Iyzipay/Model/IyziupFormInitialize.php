<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\IyziupFormInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateIyziupFormInitializeRequest;

class IyziupFormInitialize extends IyziupFormInitializeResource
{
    public static function create(CreateIyziupFormInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/v1/iyziup/form/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return IyziupFormInitializeMapper::create($rawResult)->jsonDecode()->mapIyziupFormInitialize(new IyziupFormInitialize());
    }
}