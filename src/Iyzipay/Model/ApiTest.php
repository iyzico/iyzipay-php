<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\Options;

class ApiTest extends IyzipayResource
{
    public static function retrieve(Options $options)
    {
        return HttpClient::create()->get($options->getBaseUrl() . "/payment/test", IyzipayResource::class);
    }
}
