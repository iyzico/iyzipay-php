<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ThreeDSAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreeDSAuthRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class ThreeDSAuth extends Payment
{
    public static function create(CreateThreeDSAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/auth3ds/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSAuthMapper::create()->mapThreeDSAuth(new ThreeDSAuth(), JsonBuilder::jsonDecode($rawResult));
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSAuthMapper::create()->mapThreeDSAuth(new ThreeDSAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}