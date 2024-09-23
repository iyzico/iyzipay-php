<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicThreedsPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreedsPaymentRequest;

class BasicThreedsPayment extends BasicPaymentResource
{
    public static function create(CreateThreedsPaymentRequest $request, Options $options)
    {
        $url = "/payment/3dsecure/auth/basic";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BasicThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapBasicThreedsPayment(new BasicThreedsPayment());
    }
}