<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectThreeDSAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectThreeDSAuthRequest;

class ConnectThreeDSAuth extends ConnectPayment
{
    public static function create(CreateConnectThreeDSAuthRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/auth3ds", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectThreeDSAuthMapper::create()->mapConnectThreeDSAuth(new ConnectThreeDSAuth(), JsonBuilder::jsonDecode($rawResult));
    }
}