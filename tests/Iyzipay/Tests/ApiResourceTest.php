<?php

namespace Iyzipay\Tests;

use Iyzipay\ApiResource;
use Iyzipay\DefaultHttpClient;

class ApiResourceTest extends TestCase
{
    public function test_should_create_default_http_client()
    {
        $httpClient = ApiResource::httpClient();

        $this->assertInstanceOf(get_class(DefaultHttpClient::create()), $httpClient);
    }
}