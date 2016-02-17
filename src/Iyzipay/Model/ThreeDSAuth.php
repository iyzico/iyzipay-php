<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ThreeDSAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreeDSAuthRequest;

class ThreeDSAuth extends Payment
{
    public static function create(CreateThreeDSAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/auth3ds/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSAuthMapper::create()->map(new ThreeDSAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}