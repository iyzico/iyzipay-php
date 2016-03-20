<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class PaymentPreAuth extends Payment
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/preauth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPreAuth(new PaymentPreAuth());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPreAuth(new PaymentPreAuth());
    }
}