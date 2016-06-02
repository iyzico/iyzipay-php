<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicPayment extends BasicPaymentResource
{
    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/auth/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicPaymentMapper::create($rawResult)->jsonDecode()->mapBasicPayment(new BasicPayment());
    }
}