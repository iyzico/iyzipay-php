<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListCustomersRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionListCustomersRequestTest extends TestCase
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
        $request = new SubscriptionListCustomersRequest();
        $request->setPage(3);
        $request->setCount(10);
        return $request;
    }
}
