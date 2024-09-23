<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicPaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicPaymentPreAuth extends BasicPaymentResource
{
    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $url = "/payment/preauth/basic";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BasicPaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapBasicPaymentPreAuth(new BasicPaymentPreAuth());
    }
}