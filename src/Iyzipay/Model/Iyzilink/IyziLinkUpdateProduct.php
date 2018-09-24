<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkSaveProductMapper;
use Iyzipay\Request\Iyzilink\IyziLinkSaveProductRequest;
use Iyzipay\Options;
use Iyzipay\RequestStringBuilder;

class IyziLinkUpdateProduct extends IyziLinkSaveProductResource
{
    public static function create(IyziLinkSaveProductRequest $request, Options $options, $token)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products/" . $token . RequestStringBuilder::requestToStringQuery($request, null);
        $rawResult = parent::httpClient()->put($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return IyziLinkSaveProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkSaveProduct(new IyziLinkSaveProduct());
    }
}