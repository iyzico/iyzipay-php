<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BalancePaymentInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBalancePaymentInitializeRequest;

class BalancePaymentInitialize extends BalancePaymentInitializeResource
{
    public static function create(CreateBalancePaymentInitializeRequest $request, Options $options)
    {

        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/checkoutform/initialize/auth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BalancePaymentInitializeMapper::create($rawResult)->jsonDecode()->mapBalancePaymentInitialize(new BalancePaymentInitialize());

    }
}