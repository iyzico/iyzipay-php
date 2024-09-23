<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ThreedsPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class ThreedsPayment extends PaymentResource
{
    private $signature;

    public static function create(CreateThreedsPaymentRequest $request, Options $options)
    {
        $uri = "/payment/3dsecure/auth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapThreedsPayment(new ThreedsPayment());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $uri = "/payment/detail";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapThreedsPayment(new ThreedsPayment());
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}