<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetriveAllProductMapper;
use Iyzipay\Options;
use Iyzipay\Request\Iyzilink\IyziLinkRetriveAllPagininRequest;
use Iyzipay\RequestStringBuilder;

class IyziLinkRetriveAllProduct extends IyziLinkRetriveAllProductResource
{
    public static function create(IyziLinkRetriveAllPagininRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products" . RequestStringBuilder::requestToStringQuery($request, 'pages');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkRetriveAllProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkRetriveAllProduct(new IyziLinkRetriveAllProduct());
    }
}