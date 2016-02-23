<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CrossBookingFromSubMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCrossBookingRequest;

class CrossBookingFromSubMerchant extends IyzipayResource
{
    public static function create(CreateCrossBookingRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/crossbooking/receive", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CrossBookingFromSubMerchantMapper::create()->mapCrossBookingFromSubMerchant(new CrossBookingFromSubMerchant(), JsonBuilder::jsonDecode($rawResult));
    }
}