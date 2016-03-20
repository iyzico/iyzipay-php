<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ConnectPaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectPaymentRequest;

class ConnectPaymentPreAuth extends ConnectPayment
{
    public static function create(CreateConnectPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyziconnect/preauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectPaymentPreAuthMapper::create($rawResult)->jsonDecode()->mapConnectPaymentPreAuth(new ConnectPaymentPreAuth());
    }
}