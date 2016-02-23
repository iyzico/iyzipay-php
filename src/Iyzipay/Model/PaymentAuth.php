<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\PaymentAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class PaymentAuth extends Payment
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/auth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentAuthMapper::create()->mapPaymentAuth(new PaymentAuth(), JsonBuilder::jsonDecode($rawResult));
    }

    public static function retrieve(RetrievePaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentAuthMapper::create()->mapPaymentAuth(new PaymentAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}