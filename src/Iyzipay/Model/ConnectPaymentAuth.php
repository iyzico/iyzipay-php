<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectPaymentAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectPaymentRequest;

class ConnectPaymentAuth extends ConnectPayment
{
    public static function create(CreateConnectPaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/auth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectPaymentAuthMapper::create()->mapConnectPaymentAuth(new ConnectPaymentAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}