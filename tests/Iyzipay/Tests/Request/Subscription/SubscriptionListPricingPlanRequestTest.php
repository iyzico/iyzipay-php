<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListPricingPlanRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionListPricingPlanRequestTest extends TestCase
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
        $request = new SubscriptionListPricingPlanRequest();
        $request->setPage(3);
        $request->setCount(10);
        $request->setProductReferenceCode("f52b5561-aa1b-4f31-af0b-3078cf6c4bb1");
        return $request;
    }
}
