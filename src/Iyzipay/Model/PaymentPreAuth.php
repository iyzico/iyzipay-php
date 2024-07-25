<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class PaymentPreAuth extends PaymentResource
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $uri = "/payment/preauth";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return PaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPreAuth(new PaymentPreAuth());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $url = "/payment/detail";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return PaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPreAuth(new PaymentPreAuth());
    }
}