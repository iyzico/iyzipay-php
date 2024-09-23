<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\UCSInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\UCSInitializeRequest;

class UCSInitialize extends UCSInitializeResource
{
    public static function create(UCSInitializeRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/ucs/init";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersIsV2($uri, $request, $options), $request->toJsonString());
        return UCSInitializeMapper::create($rawResult)->jsonDecode()->mapUCSInitialize(new UCSInitialize());
    }
}