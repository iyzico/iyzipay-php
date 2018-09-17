<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkDeleteProductMapper;
use Iyzipay\Options;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;


class IyziLinkDeleteProduct extends IyziLinkDeleteProductResource
{
    public static function create(Request $request, Options $options, $token)
    {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products/" . $token . RequestStringBuilder::requestToStringQuery($request, null);
        $rawResult = parent::httpClient()->delete($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkDeleteProductMapper::create($rawResult)->jsonDecode()->mapIyziLinkDeleteProduct(new IyziLinkDeleteProduct());
    }
}