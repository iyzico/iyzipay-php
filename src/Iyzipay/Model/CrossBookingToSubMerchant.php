<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\CrossBookingToSubMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCrossBookingRequest;

class CrossBookingToSubMerchant extends IyzipayResource
{
    public static function create(CreateCrossBookingRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/crossbooking/send", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CrossBookingToSubMerchantMapper::create($rawResult)->jsonDecode()->mapCrossBookingToSubMerchant(new CrossBookingToSubMerchant());
    }
}