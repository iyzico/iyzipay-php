<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionRetrieveCustomerRequestTest extends TestCase
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
        $request = new SubscriptionRetrieveCustomerRequest();
        $request->setCustomerReferenceCode("05f96803-09c1-49e4-92f5-0071556374b6");
        return $request;
    }
}
