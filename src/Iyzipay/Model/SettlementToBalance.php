<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\SettlementToBalanceMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateSettlementToBalanceRequest;

class SettlementToBalance extends SettlementToBalanceResource
{
    public static function create(CreateSettlementToBalanceRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/settlement-to-balance/init", parent::getHttpHeaders($request, $options), $request->toJsonString());

        return SettlementToBalanceMapper::create($rawResult)->jsonDecode()->mapSettlementToBalance(new SettlementToBalance());
    }
}