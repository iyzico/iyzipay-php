<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CrossBookingToSubMerchantMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCrossBookingRequest;

class CrossBookingToSubMerchant extends IyzipayResource
{
    public static function create(CreateCrossBookingRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/crossbooking/send", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CrossBookingToSubMerchantMapper::create()->mapCrossBookingToSubMerchant(new CrossBookingToSubMerchant(), JsonBuilder::jsonDecode($rawResult));
    }
}