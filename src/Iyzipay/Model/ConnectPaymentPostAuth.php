<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ConnectPaymentPostAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class ConnectPaymentPostAuth extends ConnectPayment
{
    public static function create(CreatePaymentPostAuthRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyziconnect/postauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectPaymentPostAuthMapper::create($rawResult)->jsonDecode()->mapConnectPaymentPostAuth(new ConnectPaymentPostAuth());
    }
}