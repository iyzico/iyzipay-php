<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class Payment extends PaymentResource
{
//    private $signature;

    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $uri = "/payment/auth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PaymentMapper::create($rawResult)->jsonDecode()->mapPayment(new Payment());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $uri = "/payment/detail";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PaymentMapper::create($rawResult)->jsonDecode()->mapPayment(new Payment());
    }
}