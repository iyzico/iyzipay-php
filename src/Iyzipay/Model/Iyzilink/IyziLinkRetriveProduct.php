<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetriveProductMapper;
use Iyzipay\Options;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class IyziLinkRetriveProduct extends IyziLinkRetriveProductResource
{
    public static function create(Request $request, Options $options, $token)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products/" . $token. RequestStringBuilder::requestToStringQuery($request, null);
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkRetriveProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkRetriveProduct(new IyziLinkRetriveProduct());
    }
}