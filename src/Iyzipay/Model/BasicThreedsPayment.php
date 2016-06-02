<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BasicThreedsPaymentMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreedsPaymentRequest;

class BasicThreedsPayment extends BasicPaymentResource
{
    public static function create(CreateThreedsPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/auth/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicThreedsPaymentMapper::create($rawResult)->jsonDecode()->mapBasicThreedsPayment(new BasicThreedsPayment());
    }
}