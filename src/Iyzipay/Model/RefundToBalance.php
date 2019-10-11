<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\RefundToBalanceMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateRefundToBalanceRequest;

class RefundToBalance extends RefundToBalanceResource
{
    public static function create(CreateRefundToBalanceRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/refund-to-balance/init", parent::getHttpHeaders($request, $options), $request->toJsonString());

        return RefundToBalanceMapper::create($rawResult)->jsonDecode()->mapRefundToBalance(new RefundToBalance());
    }
}