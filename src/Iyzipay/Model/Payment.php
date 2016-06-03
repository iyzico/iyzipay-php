<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class Payment extends PaymentResource
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/auth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentMapper::create($rawResult)->jsonDecode()->mapPayment(new Payment());
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentMapper::create($rawResult)->jsonDecode()->mapPayment(new Payment());
    }
}