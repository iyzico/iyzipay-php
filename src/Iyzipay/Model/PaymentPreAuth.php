<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\PaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;

class PaymentPreAuth extends Payment
{
    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/preauth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentPreAuthMapper::create()->map(new PaymentPreAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}