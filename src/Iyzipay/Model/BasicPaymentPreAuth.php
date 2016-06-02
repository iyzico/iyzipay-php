<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicPaymentPreAuth extends BasicPaymentResource
{
    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/preauth/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicPaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapBasicPaymentPreAuth(new BasicPaymentPreAuth());
    }
}