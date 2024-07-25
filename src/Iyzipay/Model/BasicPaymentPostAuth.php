<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class BasicPaymentPostAuth extends BasicPaymentResource
{
    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $url = "/payment/postauth/basic";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BasicPaymentPostAuthMapper::create($rawResult)->jsonDecode()->mapBasicPaymentPostAuth(new BasicPaymentPostAuth());
    }
}