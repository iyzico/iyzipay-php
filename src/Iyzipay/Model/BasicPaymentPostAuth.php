<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class BasicPaymentPostAuth extends BasicPaymentResource
{
    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/postauth/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicPaymentPostAuthMapper::create($rawResult)->jsonDecode()->mapBasicPaymentPostAuth(new BasicPaymentPostAuth());
    }
}