<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class PaymentAuth extends Payment
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/auth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentAuthMapper::create($rawResult)->jsonDecode()->mapPaymentAuth(new PaymentAuth());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentAuthMapper::create($rawResult)->jsonDecode()->mapPaymentAuth(new PaymentAuth());
    }
}