<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\PaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class PaymentPostAuth extends Payment
{
    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/postauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PaymentPostAuthMapper::create($rawResult)->jsonDecode()->mapPaymentPostAuth(new PaymentPostAuth());
    }
    
}