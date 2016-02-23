<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectPaymentPreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectPaymentRequest;

class ConnectPaymentPreAuth extends ConnectPayment
{
    public static function create(CreateConnectPaymentRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/preauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectPaymentPreAuthMapper::create()->mapConnectPaymentPreAuth(new ConnectPaymentPreAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}