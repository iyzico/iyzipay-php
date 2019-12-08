<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListProductsRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionListProductsRequestTest extends TestCase
{

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '[]';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }


    private function prepareRequest()
    {
        $request = new SubscriptionListProductsRequest();
        $request->setPage(3);
        $request->setCount(10);
        return $request;
    }
}
