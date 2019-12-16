<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionDetailsRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionDetailsRequestTest extends TestCase
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
        $request = new SubscriptionDetailsRequest();
        $request->setSubscriptionReferenceCode("fec5250d-1f9f-4605-bc73-db33072248f7");
        return $request;
    }
}

