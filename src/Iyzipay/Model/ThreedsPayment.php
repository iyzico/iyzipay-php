<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ThreedsPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class ThreedsPayment extends PaymentResource
{
    public static function create(CreateThreedsPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/auth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapThreedsPayment(new ThreedsPayment());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapThreedsPayment(new ThreedsPayment());
    }
}