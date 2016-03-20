<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ThreeDSAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreeDSAuthRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class ThreeDSAuth extends Payment
{
    public static function create(CreateThreeDSAuthRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/auth3ds/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSAuthMapper::create($rawResult)->jsonDecode()->mapThreeDSAuth(new ThreeDSAuth());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSAuthMapper::create($rawResult)->jsonDecode()->mapThreeDSAuth(new ThreeDSAuth());
    }
}