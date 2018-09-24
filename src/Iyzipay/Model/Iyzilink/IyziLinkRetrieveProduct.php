<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetrieveProductMapper;
use Iyzipay\Options;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class IyziLinkRetrieveProduct extends IyziLinkRetrieveProductResource
{
    public static function create(Request $request, Options $options, $token)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products/" . $token. RequestStringBuilder::requestToStringQuery($request, null);
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkRetrieveProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkRetriveProduct(new IyziLinkRetrieveProduct());
    }
}