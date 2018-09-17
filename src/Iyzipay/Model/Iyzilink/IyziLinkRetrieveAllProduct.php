<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetrieveAllProductMapper;
use Iyzipay\Options;
use Iyzipay\Request\PagininRequest;
use Iyzipay\RequestStringBuilder;

class IyziLinkRetrieveAllProduct extends IyziLinkRetrieveAllProductResource
{
    public static function create(PagininRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products" . RequestStringBuilder::requestToStringQuery($request, 'pages');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkRetrieveAllProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkRetriveAllProduct(new IyziLinkRetrieveAllProduct());
    }
}