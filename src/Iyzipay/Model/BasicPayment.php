<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicPayment extends BasicPaymentResource
{
    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $url = "/payment/auth/basic";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BasicPaymentMapper::create($rawResult)->jsonDecode()->mapBasicPayment(new BasicPayment());
    }
}